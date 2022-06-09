<template>
  <div class="flex justify-between p-5">
    <div class="flex gap-4 text-sm">
      <div class="h-10 w-10 rounded-full bg-orange-600/60 flex justify-center">
        <fa-icon icon="thumbtack" class="self-center text-white" />
      </div>
      <span class="self-center">Pinned Message</span>
      <button>
        <div class="h-10 w-10 rounded-full bg-transparent flex justify-center">
          <fa-icon
            icon="sort-down"
            size="2x"
            class="self-start text-gray-400"
          />
        </div>
      </button>
    </div>
    <div>
      <button>
        <div class="h-10 w-10 rounded-full bg-transparent flex justify-center">
          <fa-icon
            icon="ellipsis"
            size="2x"
            class="self-center text-gray-400"
          />
        </div>
      </button>
    </div>
  </div>
  <div class="overflow-y-scroll flex flex-col h-96 gap-8">
    <ContactItem
      v-for="contact in contactsStore.contacts"
      :key="contact.id"
      :contact="contact"
      :is-selected="contact.id === contactsStore.currentContact?.id"
    />
  </div>
</template>

<script setup>
import { onBeforeMount } from "vue";
import ContactItem from "./ContactItem.vue";
import { useContactsStore } from "../../../store/contactsStore";

const contactsStore = useContactsStore();

onBeforeMount(() => {
  contactsStore.getContacts();
});
</script>
