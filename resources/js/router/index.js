import { createWebHistory, createRouter } from "vue-router";
import Lots from "../components/Lots.vue";

const routes = [
    {
        path: "/",
        name: "lots",
        component: Lots
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
});
