<template>
  <div class="">
    <Form
      @submit="handleSubmit"
      :validation-schema="messageSchema"
      class="bg-white p-2 rounded-full flex justify-between gap-2"
    >
      <div class="border-r-2 px-2">
        <button value="" class="h-12 w-12 rounded-full flex justify-center">
          <fa-icon
            icon="face-smile"
            size="2x"
            class="self-center text-gray-200"
          />
        </button>
      </div>
      <Field
        type="text"
        name="text"
        placeholder="Type your message here..."
        class="border-none w-3/4"
      />

      <button
        type="submit"
        value=""
        class="h-12 w-12 rounded-full bg-purple-500 flex justify-center"
        icon="paper-plane"
      >
        <fa-icon icon="paper-plane" size="lg" class="self-center text-white" />
      </button>
    </Form>
  </div>
</template>

<script setup>
import { Form, Field } from "vee-validate";
import { useMessagesStore } from "../../../store/messagesStore";
import * as yup from "yup";

const messagesStore = useMessagesStore();

const messageSchema = {
  text: yup.string().required(),
};

function handleSubmit(values, { resetForm }) {
  messagesStore.sendMessage(values);
  resetForm();
}
</script>
