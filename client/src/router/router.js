import { createRouter, createWebHistory } from "vue-router";

import HelloView from "@/views/HelloView.vue";
import CustomersViews from "@/views/AllCustomersViews.vue";

const routes = [
    {
        path: "/",
        component: HelloView,
    },
    {
        path: "/customers",
        component: CustomersViews,
    },
];

const router = createRouter({
    history: createWebHistory("/"),
    routes,
});

export default router;
