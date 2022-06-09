<template>
  <div class="flex flex-col w-3/5">
    <ContactStatus class="border-b-2" />
    <ChatContent />
  </div>
</template>

<script setup>
import ContactStatus from "./ContactStatus.vue";
import ChatContent from "./ChatContent/ChatContent.vue";
</script>

<style></style>
