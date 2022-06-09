<template>
  <div class="flex flex-col bg-gray-200 h-screen p-2">
    <div class="overflow-scroll h-4/6 flex flex-col" ref="messageEl">
      <MessageItem
        v-for="message in messagesStore.messages"
        :key="message.id"
        :message="message"
      />
      <!-- <div ref="messageEl"></div> -->
    </div>
    <div class="w-5/6 self-center h-2/6 mt-4">
      <MessageForm />
    </div>
  </div>
</template>

<script setup>
import MessageItem from "./MessageItem.vue";
import MessageForm from "./MessageForm.vue";
import { useMessagesStore } from "../../../store/messagesStore";
import { useUserStore } from "../../../store/userStore";
import { useContactsStore } from "../../../store/contactsStore";
import { onUpdated, ref, watchEffect } from "vue";

const messagesStore = useMessagesStore();
const userStore = useUserStore();
const contactStore = useContactsStore();

const messageEl = ref(null);

onUpdated(() => {
  messageEl.value.scroll({
    top: messageEl.value.scrollHeight,
    behavior: "smooth",
  });
});

watchEffect((onClean) => {
  messagesStore.getMessages();

  const customChannel = `chat.${[
    userStore.userLoged.id,
    contactStore.currentContact.id,
  ]
    .sort()
    .join("-")}`;

  const channel = window.Echo.channel(customChannel);
  channel.listen(".messageEvent", (data) => {
    messagesStore.setMessages(data.messages);
  });

  onClean(() => {
    channel.stopListening(".messageEvent");
    window.Echo.leaveChannel(customChannel);
  });
});
</script>

<style></style>
