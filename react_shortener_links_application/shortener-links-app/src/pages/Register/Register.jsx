import { Formik, Form, Field } from 'formik'
import { Link, useNavigate } from 'react-router-dom'
import ky from 'ky'
import {
  Container,
  VStack,
  Heading,
  Box,
  Text,
  FormControl,
  FormLabel,
  Input,
  Button,
  Icon,
  Circle,
  FormErrorMessage,
} from '@chakra-ui/react'
import { IoShapes } from 'react-icons/io5'

export default function Register() {
  let navigate = useNavigate()

  async function handleSubmit(values, formikBag) {
    const resp = await ky
      .post(`http://localhost:8000/api/register`, {
        json: values,
        throwHttpErrors: false,
      })
      .json()

    if (resp.errors) {
      formikBag.setErrors(resp.errors)
      return
    }

    localStorage.setItem('access_token', resp.token)
    navigate('/')
  }

  return (
    <Box bg="gray.50" h="100vh" w="100vw">
      <Box
        maxW="400px"
        marginInline="auto"
        display="flex"
        flexDirection="column"
        alignItems="center"
        gap="1rem"
      >
        <Circle
          alignSelf="center"
          bg="gray.200"
          w="40px"
          h="40px"
          marginBlockStart="24px"
        >
          <Icon as={IoShapes} w={6} h={6} color="gray.50" />
        </Circle>
        <Container bg="white" p="2rem" borderRadius="0.5rem">
          <Formik
            initialValues={{
              name: '',
              email: '',
              password: '',
            }}
            onSubmit={(values, formikBag) => {
              handleSubmit(values, formikBag)
            }}
          >
            {({ errors }) => (
              <Form>
                <VStack gap="1rem">
                  <Heading as="h2" fontSize="md" alignSelf="start">
                    Welcome!
                  </Heading>
                  <Text fontSize="xl" fontWeight="medium">
                    Enter your details to create an account.
                  </Text>
                  <FormControl isInvalid={!!errors.name}>
                    <FormLabel htmlFor="name" fontWeight="bold">
                      Name:
                    </FormLabel>
                    <Field as={Input} id="name" type="text" name="name" />
                    <FormErrorMessage>{errors.name}</FormErrorMessage>
                  </FormControl>
                  <FormControl isInvalid={!!errors.email}>
                    <FormLabel htmlFor="email" fontWeight="bold">
                      Email:
                    </FormLabel>
                    <Field as={Input} id="email" type="email" name="email" />
                    <FormErrorMessage>{errors.email}</FormErrorMessage>
                  </FormControl>
                  <FormControl isInvalid={!!errors.password}>
                    <FormLabel htmlFor="password" fontWeight="bold">
                      Password:
                    </FormLabel>
                    <Field
                      as={Input}
                      id="password"
                      type="password"
                      name="password"
                    />
                    <FormErrorMessage>{errors.password}</FormErrorMessage>
                  </FormControl>
                  <Button
                    mt={4}
                    bgGradient="linear(to-l, #575BDE, #393ED8)"
                    _hover="none"
                    type="submit"
                    color="white"
                    width="100%"
                  >
                    Create Account
                  </Button>
                </VStack>
              </Form>
            )}
          </Formik>
        </Container>
        <Container>
          <Text fontSize="md" fontWeight="normal" align="center" color="icons">
            By creating an account, you agree to our{' '}
            <Text as={Link} to="" color="primary">
              Terms.
            </Text>
          </Text>
          <Text fontSize="md" fontWeight="normal" align="center" color="icons">
            Already have an account?{' '}
            <Text to="/login" as={Link} color="primary">
              Log In
            </Text>
          </Text>
        </Container>
      </Box>
    </Box>
  )
}
