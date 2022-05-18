<template>
  <router-link :to="`/customers/details/${customer.id}`" class="card">
        <img :src="`${host}/${customer.profile_image}`" alt="">
        <!-- <hr> -->
        <p class="name">
            {{ customer.name + " " + customer.surname }}
        </p>
    </router-link>
</template>

<script>
export default {
    props: {
        customer: {
            type: Object,
            required: true,
        }
    },
    data(){
        return {
            host: import.meta.env.VITE_SERVER_HOST
        }
    }
}
</script>

<style>
    .card{
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        -webkit-box-shadow: 0px 5px 24px -20px rgba(66, 68, 90, 1);
        -moz-box-shadow: 0px 5px 24px -20px rgba(66, 68, 90, 1);
        box-shadow: 0px 5px 24px -20px rgba(66, 68, 90, 1);
        cursor: pointer;
        transition: .3s linear;

        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;

        text-align: center;
        font-size: 25px;
        text-decoration: none;
        color: black;
    }

    .card:hover{
        transform: translateY(-5px);
    }

    .card img{
        width: 50%;
    }

    .card hr{
        width: 100%;
        border: none;
        border-top: 1px solid rgba(128, 128, 128, 0.41);
        margin: 10px 0px;
    }

    .name{
        border-top: 1px solid rgba(128, 128, 128, 0.41);
        margin-top: 10px;
        padding-top: 5px;
        width: 100%;
    }
</style>