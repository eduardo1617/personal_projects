import { Box, Skeleton, Spacer, Stack } from '@chakra-ui/react'
import LinkItem from './LinkItem'
import LinkForm from './LinkForm'
import { useState, useEffect, Suspense } from 'react'
import ky from 'ky'
import EditLink from './EditLink'
import LinksSkeleton from '../../utilities/LinksSkeletons'

export default function LinkList() {
  const [links, setLinks] = useState([])
  const [editing, setEditing] = useState(false)
  const [editLink, setEditLink] = useState({})
  const [loadingLinks, setLoadingLinks] = useState(true)

  useEffect(() => {
    const accessToken = localStorage.getItem('access_token')

    ky.get(`http://localhost:8000/api/links`, {
      headers: {
        Authorization: `Bearer ${accessToken}`,
      },
    })
      .json()
      .then((resp) => {
        setLinks(resp.data)
        setLoadingLinks(false)
      })
  }, [])

  async function handleSubmit(url) {
    const accessToken = localStorage.getItem('access_token')

    const resp = await ky
      .post(`http://localhost:8000/api/links`, {
        json: {
          url: url,
        },
        headers: {
          Authorization: `Bearer ${accessToken}`,
        },
        throwHttpErrors: false,
      })
      .json()

    setLinks([...links, resp.data])
  }

  async function handleDelete(id) {
    const accessToken = localStorage.getItem('access_token')

    await ky
      .delete(`http://127.0.0.1:8000/api/links/${id}`, {
        headers: {
          Authorization: `Bearer ${accessToken}`,
        },
      })
      .json()

    setLinks((links) => links.filter((link) => link.id !== id))
  }

  async function handleUpdate(values) {
    const json = {}
    if (values.url) {
      json.url = values.url
    }
    const accessToken = localStorage.getItem('access_token')
    const resp = await ky
      .patch(`http://127.0.0.1:8000/api/links/${editLink.id}`, {
        json,
        headers: {
          Authorization: `Bearer ${accessToken}`,
        },
      })
      .json()

    setLinks((links) => {
      return links.map((link) => {
        if (link.id === editLink.id) {
          return resp.data
        }
        return link
      })
    })
  }

  return (
    <Box
      display="flex"
      flexDirection={{ base: 'column', lg: 'row' }}
      gap="1rem"
    >
      <Box bg="gray.50" borderRadius={8} flexBasis="70%">
        <Box
          marginBlockStart="0.5rem"
          h="56px"
          display="flex"
          alignItems="center"
          px="1rem"
          my="0px"
          fontWeight="bold"
          fontSize="1rem"
          color="text"
        >
          Links
          <Spacer></Spacer>
          <LinkForm handleSubmit={handleSubmit} />
        </Box>
        <Box
          bg="white"
          w="100%"
          minH={{ base: '250px', lg: '512px' }}
          maxH="512px"
          overflowY="scroll"
          borderBottomRadius={8}
        >
          {loadingLinks ? (
            <LinksSkeleton />
          ) : (
            links.map((link) => (
              <LinkItem
                key={link.id}
                link={link}
                handleDelete={handleDelete}
                setEditing={setEditing}
                setEditLink={setEditLink}
              />
            ))
          )}
        </Box>
      </Box>
      <Box flexBasis="30%">
        <EditLink
          setEditing={setEditing}
          editing={editing}
          editLink={editLink}
          handleUpdate={handleUpdate}
        />
      </Box>
    </Box>
  )
}
