import { Text, Box, VStack, Button } from '@chakra-ui/react'
import { FaShapes } from 'react-icons/fa'

export default function NavigationMain() {
  return (
    <VStack
      bg="secondary"
      p="20px"
      alignItems="start"
      w={{ base: 'auto', md: '280px' }}
    >
      <Box color="white" paddingInlineStart="1rem">
        Dashboard UI Kit 2.0
      </Box>
      <VStack w="100%" display={{ base: 'none', md: 'block' }}>
        <Text color="white" alignSelf="start" paddingInlineStart="1rem">
          Main
        </Text>
        <VStack w="100%">
          <Button
            w="100%"
            textAlign="start"
            alignContent="start"
            display="flex"
            justifyContent="start"
            bg="primary"
            _hover={{ bg: 'primary' }}
            leftIcon={<FaShapes color="white" />}
            color="white"
          >
            Links
          </Button>
        </VStack>
      </VStack>
    </VStack>
  )
}
