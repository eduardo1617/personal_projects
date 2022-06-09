import { format } from 'date-fns'
import styles from '../stylesheets/TodoItem.module.css'
import { Formik, Field, Form } from 'formik'
import { useState } from 'react'
import { TodoEditForm } from './TodoEditForm'
// import { TodoFormik } from './TodoFormik'

export function TodoItem({ onChange, todo, onDelete, users }) {
  // function handleChange(event) {
  //   let completed = event.target.checked
  //   // let user = event.target.selected
  //   console.log(completed, todo.user_id)

  //   onChange(todo.id, completed)
  // }

  const [editing, setEditing] = useState(false)

  function handleEditing(value) {
    console.log(value)
    setEditing(value)
  }

  function handleDelete() {
    onDelete(todo.id)
  }

  let {
    user: { id, name },
  } = todo

  return (
    <div className={styles.todoContainer}>
      <Formik
        initialValues={{ completed: todo.completed, user_id: id }}
        onSubmit={(values) => {
          let { completed, user_id } = values

          onChange(todo.id, completed, user_id)
        }}
      >
        {({ values }) =>
          editing ? (
            <TodoEditForm
              users={users}
              onChange={onChange}
              todo={todo}
              onEditing={handleEditing}
            />
          ) : (
            <Form>
              <label>
                <Field
                  type="checkbox"
                  name="completed"
                  checked={values.completed}
                />
                {todo.description}-
                {format(new Date(todo.updated_at), 'yyyy-MM-dd hh:mm')}
              </label>

              <span>{name}</span>

              {/* <Field name="user_id" as="select">
                <option>select a user</option>
                {users.map((user) => {
                  return (
                    <option key={user.id} value={user.id}>
                      {user.name}
                    </option>
                  )
                })}
              </Field> */}

              {/* <button type="submit">Save</button> */}
            </Form>
          )
        }
      </Formik>

      <button onClick={() => setEditing(true)}>Edit</button>
      {/* <select>
        <option value={todo.user.id}>{name}</option>
      </select> */}
      <button
        className="remove-task"
        onClick={handleDelete} /*onClick={()=>{onDelete(todo.id)}} */
      >
        Remove
      </button>
    </div>
  )
}
