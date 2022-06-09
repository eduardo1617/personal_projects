import { Box } from '@chakra-ui/react'
import BarChart from './BarChart'
import LinkList from './LinkList'

export default function Main() {
  return (
    <Box display="flex" flexDirection="column" rowGap="1rem">
      <BarChart />
      <Box>
        <LinkList />
      </Box>
    </Box>
  )
}
