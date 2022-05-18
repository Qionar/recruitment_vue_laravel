import { createRouter, createWebHistory } from "vue-router";

import HelloView from "@/views/HelloView.vue";

const routes = [
    {
        path: "/",
        component: HelloView,
    },
];

const router = createRouter({
    history: createWebHistory("/"),
    routes,
});

export default router;
