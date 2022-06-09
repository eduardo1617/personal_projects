import {
  Box,
  FormControl,
  FormLabel,
  Input,
  Button,
  FormErrorMessage,
} from '@chakra-ui/react'
import { Formik, Form, Field } from 'formik'
import * as Yup from 'yup'

export default function EditLink({
  editing,
  setEditing,
  editLink,
  handleUpdate,
}) {
  const saveUrlScema = Yup.object().shape({
    url: Yup.string().url('The url must be a valid URL.').required('Required'),
  })

  return (
    <Box bg="gray.50" borderRadius={8}>
      <Box
        marginBlockStart="0.5rem"
        w="100%"
        h="56px"
        display="flex"
        alignItems="center"
        px="1rem"
        my="0px"
        fontWeight="bold"
        fontSize="1rem"
      >
        Edit Link
      </Box>
      <Box
        bg="white"
        w="100%"
        minH={{ base: '250px', lg: '512px' }}
        borderBottomRadius={8}
        p="1rem"
      >
        {editing ? (
          <Formik
            initialValues={{
              id: editLink.id,
              url: editLink.url,
            }}
            enableReinitialize
            validationSchema={saveUrlScema}
            onSubmit={(values) => {
              setEditing(values)
              handleUpdate(values)
              setEditing(false)
            }}
          >
            {({ errors }) => (
              <Form>
                <Box display="flex" flexDirection="column" rowGap="1rem">
                  <FormControl isInvalid={!!errors.url}>
                    <FormLabel>Url</FormLabel>
                    <Field
                      as={Input}
                      type="text"
                      name="url"
                      placeholder="Url"
                    />
                    <FormErrorMessage>{errors.url}</FormErrorMessage>
                  </FormControl>
                  <Box>
                    <Button colorScheme="blue" mr={3} type="submit">
                      Save
                    </Button>
                    <Button
                      onClick={() => {
                        setEditing(false)
                      }}
                    >
                      Cancel
                    </Button>
                  </Box>
                </Box>
              </Form>
            )}
          </Formik>
        ) : (
          <Box></Box>
        )}
      </Box>
    </Box>
  )
}
