<template>
  <div class="flex justify-between p-4">
    <div class="flex gap-3">
      <div class="h-12 w-12 rounded-full bg-gray-400"></div>
      <div class="flex flex-col justify-end">
        <span class="text-sm">{{ contactStore.currentContact.name }}</span>
        <span class="text-sm font-extralight text-gray-400"
          >Last seen Yesterday ??:?? PM</span
        >
      </div>
    </div>
    <div class="flex gap-3">
      <button class="h-12 w-12 rounded-full bg-gray-200 justify-center">
        <fa-icon
          icon="magnifying-glass"
          size="lg"
          class="self-center text-white"
        />
      </button>
      <button class="h-12 w-12 rounded-full bg-gray-200 justify-center">
        <fa-icon icon="phone" size="lg" class="self-center text-white" />
      </button>
      <button class="h-12 w-12 rounded-full bg-gray-200 justify-center">
        <fa-icon
          icon="ellipsis-vertical"
          size="lg"
          class="self-center text-white"
        />
      </button>
    </div>
  </div>
</template>

<script setup>
import { useContactsStore } from "../../store/contactsStore";
const contactStore = useContactsStore();
</script>

<style></style>
