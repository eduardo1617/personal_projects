import { createApp } from "vue";
import { library } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import App from "./App.vue";
import "./index.css";
import router from "./router";
import { createPinia } from "pinia";

library.add(fas);

createApp(App)
  .use(createPinia())
  .component("fa-icon", FontAwesomeIcon)
  .use(router)
  .mount("#app");
