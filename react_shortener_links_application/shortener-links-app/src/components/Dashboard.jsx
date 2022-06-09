import NavigationHeader from './Navigation/NavigationHeader'
import NavigationMain from './Navigation/NavigationMain'
import Main from './Main/Main'
import { Box } from '@chakra-ui/react'

export default function Dashboard() {
  return (
    <Box
      display="flex"
      flexDirection={{ base: 'column', md: 'row' }}
      bg="gray_dark"
    >
      <NavigationMain />
      <Box
        display="flex"
        flexDirection="column"
        w="100%"
        p="1rem"
        rowGap="1rem"
      >
        <NavigationHeader />
        <Main />
      </Box>
    </Box>
  )
}
