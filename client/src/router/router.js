import { createRouter, createWebHistory } from "vue-router";

import HelloView from "@/views/HelloView.vue";
import CustomersViews from "@/views/AllCustomersViews.vue";
import DetailsCustomerView from "@/views/DetailsCustomerView.vue";

import Error500 from "@/views/errors/Error500.vue";
import Error404 from "@/views/errors/Error404.vue";

const routes = [
    {
        path: "/",
        component: HelloView,
    },
    {
        path: "/customers",
        component: CustomersViews,
    },
    {
        path: "/customers/details/:id",
        component: DetailsCustomerView,
    },
    {
        path: "/error/500",
        component: Error500,
    },
    {
        path: "/error/404",
        component: Error404,
    },
];

const router = createRouter({
    history: createWebHistory("/"),
    routes,
});

export default router;
