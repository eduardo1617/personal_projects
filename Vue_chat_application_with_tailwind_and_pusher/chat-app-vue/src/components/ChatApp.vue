<template>
  <div
    class="container mx-auto bg-slate-50 rounded-3xl shadow-md flex overflow-hidden h-full"
  >
    <AsideContent />
    <template v-if="Object.keys(contactsStore.currentContact).length">
      <CurrentChat />
    </template>
    <template v-else>
      <div
        class="h-full w-3/5 bg-repeat flex justify-center bg-purple-100/70"
        style="
          background-image: url(https://tailwindcss.com/img/background-pattern.svg);
        "
      >
        <div class="self-center">
          <span class="font-black text-purple-900 text-4xl"
            >Click a contact to start a conversation</span
          >
        </div>
      </div>
    </template>
  </div>
</template>

<script setup>
import AsideContent from "./Aside/AsideContent.vue";
import CurrentChat from "./CurrentChat/CurrentChat.vue";
import { useContactsStore } from "../store/contactsStore";

const contactsStore = useContactsStore();
</script>

<style></style>
