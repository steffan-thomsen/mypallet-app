import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import axios from "axios";
import "./index.css";

axios.defaults.baseURL = "http://mypallet.test/api";

const app = createApp(App);
app.use(router);
app.mount("#app");
