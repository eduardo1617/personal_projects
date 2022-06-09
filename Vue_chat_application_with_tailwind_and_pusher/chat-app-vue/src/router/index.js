import { createWebHistory, createRouter } from "vue-router";
import ChatHome from "../pages/ChatHome.vue";
import ChatLogin from "../pages/Login/ChatLogin.vue";
import ChatRegister from "../pages/Register/ChatRegister.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: ChatHome,
  },
  {
    path: "/login",
    name: "login",
    component: ChatLogin,
  },
  {
    path: "/register",
    name: "register",
    component: ChatRegister,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
