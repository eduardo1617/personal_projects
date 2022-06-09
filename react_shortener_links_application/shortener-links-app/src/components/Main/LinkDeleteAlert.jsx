import {
  Button,
  useDisclosure,
  Box,
  AlertDialog,
  AlertDialogOverlay,
  AlertDialogContent,
  AlertDialogHeader,
  AlertDialogBody,
  AlertDialogFooter,
} from '@chakra-ui/react'
import { useRef } from 'react'
import { DeleteIcon } from '@chakra-ui/icons'

export default function LinkDeleteAlert({ handleDelete, link }) {
  const { isOpen, onOpen, onClose } = useDisclosure()
  const cancelRef = useRef()

  function onClick() {
    handleDelete(link.id)
    onClose()
  }

  return (
    <Box>
      <Button bg="none" color="icons" onClick={onOpen} w="40px">
        <DeleteIcon />
      </Button>

      <AlertDialog
        isOpen={isOpen}
        leastDestructiveRef={cancelRef}
        onClose={onClose}
      >
        <AlertDialogOverlay>
          <AlertDialogContent>
            <AlertDialogHeader fontSize="lg" fontWeight="bold">
              Delete Link
            </AlertDialogHeader>

            <AlertDialogBody>
              Are you sure? You can't undo this action afterwards.
            </AlertDialogBody>

            <AlertDialogFooter>
              <Button ref={cancelRef} onClick={onClose}>
                Cancel
              </Button>
              <Button colorScheme="red" onClick={onClick} ml={3}>
                Delete
              </Button>
            </AlertDialogFooter>
          </AlertDialogContent>
        </AlertDialogOverlay>
      </AlertDialog>
    </Box>
  )
}
