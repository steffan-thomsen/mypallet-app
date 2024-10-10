import { createRouter, createWebHistory } from "vue-router";
import TransportUnits from "../views/TransportUnits.vue";

const routes = [{ path: "/", component: TransportUnits }];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
