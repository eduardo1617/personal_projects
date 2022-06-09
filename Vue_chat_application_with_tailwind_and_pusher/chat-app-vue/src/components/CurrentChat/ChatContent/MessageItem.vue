<template>
  <template v-if="userStore.userLoged.id === message.sender.id">
    <div
      class="bg-purple-500 rounded-b-3xl rounded-tl-3xl py-2 px-4 text-white m-4 w-fit self-end"
    >
      <span>{{ message.text }}</span>
    </div>
  </template>
  <template v-else>
    <div
      class="bg-gray-300 rounded-b-3xl rounded-tr-3xl py-2 px-4 text-gray-600 m-4 w-fit self-start"
    >
      <span>{{ message.text }}</span>
    </div>
  </template>
</template>

<script setup>
import { useUserStore } from "../../../store/userStore";

const userStore = useUserStore();

defineProps({
  message: {
    required: true,
    type: Object,
  },
});
</script>
