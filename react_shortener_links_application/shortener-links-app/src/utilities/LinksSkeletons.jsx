import { Skeleton, Stack, Spacer } from '@chakra-ui/react'

export default function LinksSkeleton() {
  return (
    <>
      <Stack>
        {Array.from(Array(5).keys()).map((i) => (
          <Stack alignItems="center" direction="row" key={i} p="2rem">
            <Stack spacing={2}>
              <Skeleton h={5} w="500px"></Skeleton>
              <Skeleton h={3} w="500px"></Skeleton>
            </Stack>
            <Spacer></Spacer>
            <Stack>
              <Skeleton h={10} w="50px"></Skeleton>
            </Stack>
            <Stack>
              <Skeleton h={10} w="50px"></Skeleton>
            </Stack>
          </Stack>
        ))}
      </Stack>
    </>
  )
}
