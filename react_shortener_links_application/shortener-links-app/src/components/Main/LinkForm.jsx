import {
  Button,
  Modal,
  ModalOverlay,
  ModalContent,
  ModalHeader,
  ModalBody,
  ModalCloseButton,
  ModalFooter,
  FormControl,
  FormLabel,
  Input,
  useDisclosure,
  Box,
  FormErrorMessage,
} from '@chakra-ui/react'
import { AddIcon } from '@chakra-ui/icons'
import { Formik, Form, Field } from 'formik'
import React, { useRef } from 'react'
import * as Yup from 'yup'

export default function LinkForm({ handleSubmit }) {
  const { isOpen, onOpen, onClose } = useDisclosure()
  const finalRef = useRef()

  const saveUrlScema = Yup.object().shape({
    url: Yup.string().url('The url must be a valid URL.').required('Required'),
  })

  return (
    <Box>
      <Button onClick={onOpen}>
        {' '}
        <AddIcon />
      </Button>

      <Modal finalFocusRef={finalRef} isOpen={isOpen} onClose={onClose}>
        <Formik
          initialValues={{
            url: '',
          }}
          validationSchema={saveUrlScema}
          onSubmit={(values, { resetForm }) => {
            handleSubmit(values.url)

            resetForm()
            onClose()
          }}
        >
          {({ errors }) => (
            <Form>
              <ModalOverlay />
              <ModalContent>
                <ModalHeader>Shorten your url</ModalHeader>
                <ModalCloseButton />
                <ModalBody pb={6}>
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
                </ModalBody>

                <ModalFooter>
                  <Button colorScheme="blue" mr={3} type="submit">
                    Save
                  </Button>
                  <Button onClick={onClose}>Cancel</Button>
                </ModalFooter>
              </ModalContent>
            </Form>
          )}
        </Formik>
      </Modal>
    </Box>
  )
}
