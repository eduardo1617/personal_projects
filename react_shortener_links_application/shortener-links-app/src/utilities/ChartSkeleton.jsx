import { Box, Skeleton } from '@chakra-ui/react'

export default function ChartSkeleton() {
  return (
    <Box
      p="2rem"
      display="flex"
      justifyContent="center"
      alignItems="end"
      h="208px"
      columnGap="1rem"
    >
      <Skeleton
        startColor="gray_dark"
        endColor="primary"
        height="60px"
        width="80px"
      />
      <Skeleton
        startColor="gray_dark"
        endColor="primary"
        height="120px"
        width="80px"
      />
      <Skeleton
        startColor="gray_dark"
        endColor="primary"
        height="150px"
        width="80px"
      />
      <Skeleton
        startColor="gray_dark"
        endColor="primary"
        height="90px"
        width="80px"
      />
    </Box>
  )
}
