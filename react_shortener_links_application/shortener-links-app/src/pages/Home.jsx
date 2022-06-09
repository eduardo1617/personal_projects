import ky from 'ky'
import { useEffect, useState } from 'react'
import { useNavigate } from 'react-router'
import Dashboard from '../components/Dashboard'
import { Box, Spinner } from '@chakra-ui/react'

export default function Home() {
  const navigate = useNavigate()
  const [user, setUser] = useState(null)
  const [isLoading, setIsLoading] = useState(true)

  useEffect(() => {
    ;(async function getUser() {
      try {
        const accessToken = localStorage.getItem('access_token')
        const resp = await ky
          .get(`http://localhost:8000/api/user`, {
            headers: {
              Authorization: `Bearer ${accessToken}`,
            },
          })
          .json()
        setUser(resp)
      } catch (error) {
        await error.response.json()

        localStorage.removeItem('access_token')
        navigate('/login')
      } finally {
        setIsLoading(false)
      }
    })()
  }, [navigate])

  if (isLoading) {
    return (
      <Box h="100vh" display="flex" justifyContent="center" alignItems="center">
        <Spinner
          thickness="4px"
          speed="0.65s"
          emptyColor="gray.200"
          color="primary"
          size="xl"
        />
      </Box>
    )
  }

  if (!user) {
    return null
  }

  return (
    <>
      <Dashboard />
    </>
  )
}
