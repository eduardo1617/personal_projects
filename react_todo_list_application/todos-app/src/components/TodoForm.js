export function TodoForm({ onSubmit, users }) {
  function dataForm(event) {
    event.preventDefault()
    const data = new FormData(event.target)
    onSubmit(data.get('description'), data.get('user_id'))
    console.log(data.get('user'))
  }

  return (
    <form className="" onSubmit={dataForm}>
      <input
        className=""
        type="text"
        name="description"
        // value={input}
        // onChange={handleChanges}
      />
      <button className="">Add</button>
      <select name="user_id">
        {users.map((user) => (
          <option key={user.id} value={user.id}>
            {user.name}
          </option>
        ))}
      </select>
    </form>
  )
}
