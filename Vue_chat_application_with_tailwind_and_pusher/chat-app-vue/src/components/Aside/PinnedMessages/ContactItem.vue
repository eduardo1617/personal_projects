<template>
  <div>
    <button
      class="rounded-3xl p-6 w-full flex justify-between shadow-lg"
      :class="{
        'bg-purple-500': isSelected,
        'shadow-purple-500/50': isSelected,
      }"
      @click="onClick(contact)"
    >
      <div class="flex gap-2">
        <div class="h-12 w-12 rounded-full bg-gray-400"></div>
        <div class="flex flex-col justify-center text-left">
          <span
            class="text-sm"
            :class="{
              'text-white': isSelected,
              'text-black': !isSelected,
            }"
            >{{ contact.name }}</span
          >
          <span
            class="text-sm font-extralight text-slate-50"
            :class="{
              'text-white': isSelected,
              'text-black': !isSelected,
            }"
            >Good Morning</span
          >
        </div>
      </div>
      <div>
        <div class="flex flex-col">
          <span
            class="text-sm font-extralight text-slate-50"
            :class="[isSelected ? 'text-white' : 'text-black']"
            >12:00</span
          >
          <span
            class="text-sm text-white bg-red-500 rounded-full h-6 w-6 self-center"
            >2</span
          >
        </div>
      </div>
    </button>
  </div>
</template>

<script setup>
import { useContactsStore } from "../../../store/contactsStore";

const currentContactStore = useContactsStore();

defineProps({
  contact: {
    required: true,
    type: Object,
  },
  isSelected: {
    default: false,
    type: Boolean,
  },
});

function onClick(contact) {
  currentContactStore.selectedContact(contact);
}
</script>
