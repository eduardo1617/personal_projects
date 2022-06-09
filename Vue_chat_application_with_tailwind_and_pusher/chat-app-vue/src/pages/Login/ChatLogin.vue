<template>
  <div class="w-2/5 mx-auto bg-slate-50 rounded-3xl shadow-md p-8">
    <Form
      class="flex flex-col"
      @submit="handleLogin"
      :validation-schema="loginSchema"
      ref="formErrors"
    >
      <h1 class="mx-auto text-3xl text-purple-500 font-black">Login</h1>
      <Field
        class="p-2 m-6 bg-transparent border-y-0 border-x-0 border-b-2 border-purple-500"
        type="email"
        placeholder="Your email"
        name="email"
        id=""
      />
      <ErrorMessage name="email" />
      <Field
        class="p-2 m-6 bg-transparent border-y-0 border-x-0 border-b-2 border-purple-500"
        type="password"
        placeholder="Your password"
        name="password"
      />
      <router-link to="/register" class="p-2 m-6 mx-auto text-gray-500"
        >Don't have an account?
        <span class="font-medium text-purple-700">Register</span>.</router-link
      >
      <input
        class="p-4 m-6 bg-purple-500 text-white rounded-md font-bold"
        type="submit"
        value="Login"
      />
    </Form>
  </div>
</template>

<script setup>
import ky from "ky";
import router from "../../router/index";
import { Form, Field, ErrorMessage } from "vee-validate";
import * as yup from "yup";
import { ref } from "@vue/reactivity";

const formErrors = ref();

async function handleLogin(values) {
  // console.log(JSON.stringify(values, null, 2));
  const resp = await ky
    .post(`http://localhost:8000/api/login`, {
      json: {
        email: values.email,
        password: values.password,
      },
      throwHttpErrors: false,
    })
    .json();
  if (resp.errors) {
    formErrors.value.setErrors(resp.errors);

    return;
  }
  localStorage.setItem("access_token", resp.token);
  router.push({ path: "/" });
}

const loginSchema = {
  email: yup.string().required().email(),
  password: yup.string().required().min(4),
};
</script>
