import { defineStore } from "pinia";
import ky from "ky";
import { useContactsStore } from "./contactsStore";
import { useUserStore } from "./userStore";

export const useMessagesStore = defineStore("messages", {
  state: () => {
    return {
      messages: [],
      // allMessages: [],
    };
  },
  actions: {
    getMessages() {
      const contact = useContactsStore();

      const accessToken = localStorage.getItem("access_token");

      ky.get(
        `http://localhost:8000/api/messages/contact/${contact.currentContact.id}`,
        {
          headers: {
            Authorization: `Bearer ${accessToken}`,
          },
        }
      )
        .json()
        .then((resp) => {
          this.messages = resp.data;
        });
    },
    async sendMessage(values) {
      const sender = useUserStore();
      const receiver = useContactsStore();

      await ky
        .post(`http://localhost:8000/api/messages`, {
          json: {
            text: values.text,
            sender_id: sender.userLoged.id,
            receiver_id: receiver.currentContact.id,
          },
        })
        .json();
      // this.messages.push(resp.data);
    },
    setMessages(message) {
      this.messages.push(message);
    },
  },
});
