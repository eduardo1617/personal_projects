import { Box } from '@chakra-ui/react'
import BarChartItem from './BarChartItem'

export default function BarChart() {
  return (
    <Box bg="gray.50" borderRadius={8}>
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
        This Month
      </Box>
      <Box bg="white" h="208px" borderBottomRadius={8}>
        <BarChartItem />
      </Box>
    </Box>
  )
}
