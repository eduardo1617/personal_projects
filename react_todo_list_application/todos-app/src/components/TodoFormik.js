import React from 'react'
import { useFormik } from 'formik'

export function TodoFormik({ users, onSubmit }) {
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
    initialValues: { description: '', user_id: '' },
    validate,
    onSubmit: (values, { resetForm }) => {
      JSON.stringify(values, null, 2)

      //mandamos los valores como parametros a nuestra funcion
      //   console.log(values.description, values.user_id)
      onSubmit(values.description, values.user_id)

      resetForm()
    },
  })
  return (
    <form onSubmit={formik.handleSubmit}>
      <input
        name="description"
        type="text"
        {...formik.getFieldProps('description')}
        // onChange={formik.handleChange}
        // value={formik.values.description}
      />
      <select name="user_id" {...formik.getFieldProps('user_id')}>
        <option>select a user</option>
        {users.map((user) => (
          <option key={user.id} value={user.id}>
            {user.name}
          </option>
        ))}
      </select>
      <button type="submit">Submit</button>
      {formik.errors.description ? (
        <div>{formik.errors.description}</div>
      ) : null}
    </form>
  )
}
