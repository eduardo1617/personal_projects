<template>
  <ChatApp />
</template>

<script setup>
import ChatApp from "../components/ChatApp.vue";
import { onBeforeMount } from "vue";
import { useUserStore } from "../store/userStore";

const userStore = useUserStore();

onBeforeMount(() => {
  userStore.getUser();
});
</script>
