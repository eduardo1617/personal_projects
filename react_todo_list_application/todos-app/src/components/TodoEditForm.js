import React from 'react'
import { useFormik } from 'formik'

export function TodoEditForm({ users, onChange, todo, onEditing }) {
  const validate = (values) => {
    const errors = {}

    if (!values.description) {
      errors.description = 'This Field is Required'
    } else if (values.description.length < 3) {
      errors.description = 'Must be at least 1 character or more'
    }

    return errors
  }

  const formik = useFormik({
    initialValues: {
      description: todo.description,
      completed: todo.completed,
      user_id: todo.user.id,
    },
    validate,
    onSubmit: (values, { resetForm }) => {
      JSON.stringify(values, null, 2)

      let data = values

      onChange(todo.id, data)
      onEditing(false)
      //   onChange(values.description, values.user_id)

      resetForm()
    },
  })
  return (
    <form onSubmit={formik.handleSubmit}>
      <input
        type="checkbox"
        name="completed"
        value={formik.values.completed}
        checked={formik.values.completed}
        {...formik.getFieldProps('completed')}
      ></input>

      <input
        name="description"
        type="text"
        value={formik.values.description}
        {...formik.getFieldProps('description')}
      />
      <select name="user_id" {...formik.getFieldProps('user_id')}>
        <option>select a user</option>
        {users.map((user) => (
          <option key={user.id} value={user.id}>
            {user.name}
          </option>
        ))}
      </select>

      <button type="submit">Save</button>
      {formik.errors.description ? (
        <div>{formik.errors.description}</div>
      ) : null}
    </form>
  )
}
