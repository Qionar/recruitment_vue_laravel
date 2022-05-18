<template>
    <div class="cards-wrapper">
        <customer-card v-for="customer in customers" :key="customer.id" :customer="customer"></customer-card>
    </div>
</template>

<script>

import CustomerCard from '@/components/CustomerCard.vue';

export default {
    components: {
        CustomerCard
    },
    props: {
        customers: {
            type: Array,
            required: true
        }
    }
}
</script>

<style>
    .cards-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 30px;
    }
</style>