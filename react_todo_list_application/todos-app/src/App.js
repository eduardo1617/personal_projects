import './App.css'
import { TodoList } from './components/TodoList.js'

function App() {
  return (
    <div className="todo-list-container">
      <div className="todo-list">
        <h1>Things to Do</h1>
        <TodoList />
      </div>
    </div>
  )
}

export default App
