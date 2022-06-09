import {
  HStack,
  InputGroup,
  InputLeftElement,
  Input,
  Spacer,
  IconButton,
} from '@chakra-ui/react'
import { SearchIcon } from '@chakra-ui/icons'
import { MdOutlineLogout } from 'react-icons/md'
import { useNavigate } from 'react-router'

export default function NavigationHeader() {
  const navigate = useNavigate()

  function handleClick() {
    localStorage.removeItem('access_token')
    navigate('/login')
  }

  return (
    <HStack>
      <InputGroup w="200px" bg="white" borderRadius="1rem">
        <InputLeftElement
          pointerEvents="none"
          children={<SearchIcon color="gray_dark" />}
        />
        <Input type="text" placeholder="Search" color="gray_dark" />
      </InputGroup>
      <Spacer></Spacer>
      <HStack>
        <IconButton
          aria-label="Search database"
          bg="none"
          onClick={handleClick}
          color="icons"
          icon={<MdOutlineLogout fontSize="1.5rem" />}
        />
      </HStack>
    </HStack>
  )
}
