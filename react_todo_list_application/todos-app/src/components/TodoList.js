import { TodoItem } from './TodoItem.js'
// import { TodoForm } from './TodoForm.js'
import { useEffect, useState } from 'react'
import ky from 'ky'
import { TodoFormik } from './TodoFormik.js'

export function TodoList() {
  const [todos, setTodos] = useState([])
  const [users, setUsers] = useState([])

  useEffect(() => {
    ky.get('http://127.0.0.1:8000/api/todos')
      .json()
      .then((response) => {
        setTodos(response.data)
      })
  }, [])

  async function handleSubmit(description, user_id) {
    const response = await ky
      .post('http://127.0.0.1:8000/api/todos', {
        json: {
          description,
          user_id,
        },
      })
      .json()
    setTodos((todos) => {
      return [...todos, response.data]
    })
  }

  async function handleChange(id, data) {
    const response = await ky
      .patch(`http://127.0.0.1:8000/api/todos/${id}`, {
        json: {
          ...data,
        },
      })
      .json()

    // const _todos = todos.map((todo) => {
    //   if (todo.id === id) {
    //     return response.data
    //   }
    //   return todo
    // })

    // setTodos(_todos)

    setTodos((todos) => {
      return todos.map((todo) => {
        if (todo.id === id) {
          return response.data
        }
        return todo
      })
    })
  }

  async function handleDelete(id) {
    await ky.delete(`http://127.0.0.1:8000/api/todos/${id}`).json()

    // const _todos = todos.filter((todo) => {
    //     return todo.id !== id
    // });

    // setTodos(_todos);

    setTodos((todos) => todos.filter((todo) => todo.id !== id))
  }

  useEffect(() => {
    ky.get('http://127.0.0.1:8000/api/users')
      .json()
      .then((response) => {
        setUsers(response.data)
      })
  }, [])

  return (
    <div>
      {/* <TodoForm onSubmit={handleSubmit} users={users} /> */}
      <TodoFormik users={users} onSubmit={handleSubmit} />

      <div className="task-list-container">
        {todos.map((todo) => (
          <TodoItem
            key={todo.id}
            onChange={handleChange}
            onDelete={handleDelete}
            todo={todo}
            users={users}
          />
        ))}
      </div>
    </div>
  )
}
