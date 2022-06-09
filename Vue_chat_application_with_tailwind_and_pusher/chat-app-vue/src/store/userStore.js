import { defineStore } from "pinia";
import ky from "ky";
import router from "../router/index.js";

export const useUserStore = defineStore("userLoged", {
  state: () => {
    return {
      userLoged: {},
    };
  },
  actions: {
    async getUser() {
      try {
        const accessToken = localStorage.getItem("access_token");
        const resp = await ky
          .get(`http://localhost:8000/api/user`, {
            headers: {
              Authorization: `Bearer ${accessToken}`,
            },
          })
          .json();
        this.userLoged = resp;
      } catch (error) {
        await error.response.json();

        localStorage.removeItem("access_token");
        router.push({ path: "/login" });
      }
    },
  },
});
