<template>
  <div class="bg-neutral-300 h-screen py-8">
    <router-view />
  </div>
</template>

<script setup>
import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Echo = new Echo({
  broadcaster: "pusher",
  key: "3b4bb461a8371350eed2",
  cluster: "mt1",
  forceTLS: true,
});
</script>

<style></style>
