import { createRouter, createWebHistory } from "vue-router";

import HelloView from "@/views/HelloView.vue";
import CustomersViews from "@/views/AllCustomersViews.vue";
import DetailsCustomerView from "@/views/DetailsCustomerView.vue";

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
];

const router = createRouter({
    history: createWebHistory("/"),
    routes,
});

export default router;
