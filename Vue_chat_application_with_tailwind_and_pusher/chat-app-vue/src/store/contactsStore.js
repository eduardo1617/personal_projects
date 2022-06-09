import { defineStore } from "pinia";
import ky from "ky";
// import { useUserStore } from "./userStore";

export const useContactsStore = defineStore("contacts", {
  state: () => {
    return {
      contacts: [],
      currentContact: {},
    };
  },
  actions: {
    async getContacts() {
      // const contact = useUserStore();
      const accessToken = localStorage.getItem("access_token");

      await ky
        .get(`http://localhost:8000/api/users`, {
          headers: {
            Authorization: `Bearer ${accessToken}`,
          },
        })
        .json()
        .then(({ data }) => {
          this.contacts = data;
        });
    },
    selectedContact(contact) {
      this.currentContact = contact;
    },
  },
});
