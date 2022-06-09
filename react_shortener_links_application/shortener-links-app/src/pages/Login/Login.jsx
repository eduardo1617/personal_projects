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
  HStack,
  FormErrorMessage,
  Spacer,
  Checkbox,
} from '@chakra-ui/react'
import { IoShapes } from 'react-icons/io5'

export default function Login() {
  let navigate = useNavigate()

  async function handleSubmit(values, formikBag) {
    const resp = await ky
      .post(`http://localhost:8000/api/login`, {
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
                <VStack gap="1rem" alignItems="start">
                  <Heading as="h2" fontSize="md">
                    Welcome back.
                  </Heading>
                  <Text fontSize="2xl" fontWeight="normal">
                    Enter your details below.
                  </Text>
                  <FormControl isInvalid={!!errors.email}>
                    <FormLabel htmlFor="email" fontWeight="bold">
                      Email:
                    </FormLabel>
                    <Field as={Input} id="email" type="email" name="email" />
                    <FormErrorMessage>{errors.email}</FormErrorMessage>
                  </FormControl>
                  <FormControl isInvalid={!!errors.password}>
                    <HStack align="baseline">
                      <FormLabel htmlFor="password" fontWeight="bold">
                        Password:
                      </FormLabel>
                      <Spacer />
                      <Text as={Link} to="#" color="icons">
                        Forgot password?
                      </Text>
                    </HStack>
                    <Field
                      as={Input}
                      id="password"
                      type="password"
                      name="password"
                    />
                    <FormErrorMessage>{errors.password}</FormErrorMessage>
                  </FormControl>
                  <FormControl>
                    <HStack>
                      <Field
                        as={Checkbox}
                        id="name"
                        type="checkbox"
                        name="name"
                      />
                      <FormLabel htmlFor="name" fontWeight="normal">
                        Remember Me
                      </FormLabel>
                    </HStack>
                  </FormControl>
                  <Button
                    mt={4}
                    bgGradient="linear(to-l, #575BDE, #393ED8)"
                    _hover="none"
                    type="submit"
                    color="white"
                    alignSelf="center"
                    width="100%"
                  >
                    Log In
                  </Button>
                </VStack>
              </Form>
            )}
          </Formik>
        </Container>
        <Container>
          <Text fontSize="md" fontWeight="normal" align="center" color="icons">
            Don't have an account?{' '}
            <Text to="/register" as={Link} color="primary">
              Sign Up
            </Text>
          </Text>
        </Container>
      </Box>
    </Box>
  )
}
