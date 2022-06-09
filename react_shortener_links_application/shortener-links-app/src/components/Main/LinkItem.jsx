import { Box, IconButton, HStack, Spacer, Text, VStack } from '@chakra-ui/react'
import { EditIcon } from '@chakra-ui/icons'
import LinkDeleteAlert from './LinkDeleteAlert'

export default function LinkItem({
  link,
  handleDelete,
  setEditing,
  setEditLink,
}) {
  function handleClick() {
    setEditing(true)
    setEditLink(link)
  }

  return (
    <Box display="flex" p="1rem" flexDirection={{ base: 'column', sm: 'row' }}>
      <VStack alignItems="start">
        <Text>{link.short_link}</Text>
        <Text noOfLines={1} color="icons">
          {link.url}
        </Text>
      </VStack>
      <Spacer></Spacer>
      <HStack spacing="1rem">
        <Text>{link.created_at}</Text>
        <Text>{link.total_clicks} views</Text>
        <LinkDeleteAlert handleDelete={handleDelete} link={link} />
        <IconButton
          onClick={handleClick}
          bg="none"
          color="icons"
          icon={<EditIcon />}
        />
      </HStack>
    </Box>
  )
}
