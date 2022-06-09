import './normalize.css'
import Register from './pages/Register/Register.jsx'
import Login from './pages/Login/Login.jsx'
import Home from './pages/Home.jsx'
import { Route, Routes } from 'react-router-dom'

function App() {
  return (
    <div>
      <Routes>
        <Route path="/register" element={<Register />} />
        <Route path="/login" element={<Login />} />
        <Route path="/" element={<Home />} />
      </Routes>
    </div>
  )
}

export default App
