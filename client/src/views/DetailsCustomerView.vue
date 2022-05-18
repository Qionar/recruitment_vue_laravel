<template>
  <div class="details-wrapper">
        <router-link to="/customers" class="link-back">Back to all customers</router-link>
        <div  v-if="isLoading === false" class="card-details">
            <div class="card-details-img">
                <img :src="`${host}/${data.profile_image}`" alt="">
            </div>
            <div class="card-details-info">
                <p class="details-name">
                    {{data.title + " " + data.name + " " + data.surname}}
                </p>
                <div class="details-contact-wrapper">
                    <div class="details-contact">
                        <strong>Email</strong>
                        <p>
                            {{data.email}}
                        </p>
                    </div>
                    <div class="details-contact">
                        <strong>Phone</strong>
                        <p>
                            {{data.phone}}
                        </p>
                    </div>
                </div>
                <div class="actions-wrapper">
                    <button class="update-customer" @click="editOpen">Edit</button>
                    <button v-if="isDeleting === false" class="delete-customer" @click="deleteCustomer">Delete</button>
                    <button v-else class="delete-customer action-disabled ">Delete</button>
                </div>
            </div>
        </div>
        <details-loader v-else />
        <modal-update v-if="isModalOpened === true" @editClose="editClose" :data="data" @updateCustomer="updateCustomer" />
    </div>
</template>

<script>
import axios from 'axios';
import DetailsLoader from '@/components/DetailsLoader.vue';
import ModalUpdate from '@/components/ModalUpdate.vue';

export default {
    components: {
        DetailsLoader, ModalUpdate
    },
    data() {
            return {
                data: {},
                customerId: this.$route.params.id,
                host: import.meta.env.VITE_SERVER_HOST,
                isLoading: false,
                isDeleting: false,
                isModalOpened: false
            }
        },
        methods: {
            async fetchCustomerDetails(){
                try {
                    this.isLoading = true;
                    const response = await axios.get(import.meta.env.VITE_SERVER_HOST + '/api/customers/details/' + this.customerId);
                    this.data = response.data;
                    this.isLoading = false;
                } catch (error) {
                    // handle errors
                }
            },
            async deleteCustomer(){
                try {
                    this.isDeleting = true;
                    const response = await axios.delete(import.meta.env.VITE_SERVER_HOST + '/api/customers/delete/' + this.customerId);
                    if(response.status === 200){
                        this.$router.push('/customers')
                    }
                } catch (error) {

                }
            },
            editOpen(){
                this.isModalOpened = true;
            },
            editClose(){
                this.isModalOpened = false;
            },
            updateCustomer(){
                this.fetchCustomerDetails();
            }
        },
        mounted(){
            this.fetchCustomerDetails();
        }
}
</script>

<style>
.details-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100vh;
    }

    .card-details {
        width: 50%;
        height: 50vh;

        display: flex;

        background: #fff;
        border-radius: 10px;
        padding: 20px;
        -webkit-box-shadow: 0px 5px 24px -20px rgba(66, 68, 90, 1);
        -moz-box-shadow: 0px 5px 24px -20px rgba(66, 68, 90, 1);
        box-shadow: 0px 5px 24px -20px rgba(66, 68, 90, 1);
    }

    .card-details-img{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40%;
        height: 100%;
        border-right: 1px solid rgba(128, 128, 128, 0.414);
    }

    .card-details-img img{
        width: 100%;
    }

    .card-details-info{
        width: 60%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .details-name{
        text-align: center;
        font-size: 30px;
        font-weight: 700;
    }

    .details-contact-wrapper{
        display: flex;
    }

    .details-contact{
        width: 50%;
        text-align: center;
        font-size: 18px;
    }

    .actions-wrapper{
        display: flex;
        justify-content: space-between;
        padding: 0px 10px;
    }

    .update-customer, .delete-customer{
        width: 49%;
        padding: 15px;
        font-size: 18px;
        font-weight: 500;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: .3s linear;
    }

    .update-customer{
        background: rgba(11, 113, 255, 0.8);
        color: #fff;
    }

    .delete-customer{
        background: rgba(255, 64, 0, 0.8);
        color: #fff;
    }

    .update-customer:hover {
        box-shadow: 250px 0 0 0 #fff inset;
        color: rgb(11, 113, 255);
    }
    
    .delete-customer:hover{
        box-shadow: 250px 0 0 0 #fff inset;
        color: rgb(255, 64, 0);
    }

    .action-disabled{
        background: rgba(68, 68, 68, 0.56);
    }

    .action-disabled:hover{
        background: rgba(68, 68, 68, 0.56) !important;
        color: #fff !important;
        box-shadow: none;
    }

    .link-back{
        position: absolute;
        top: 20px;
        left: 20px;
        font-size: 20px;
        color: rgba(255, 0, 0, 0.539);
    }

    .link-back:hover{
        text-decoration: none;
    }

    @media screen and (min-width: 768px) and (max-width: 1020px){
        .card-details {
            width: 70%;
        }
    }

    @media screen and (min-width: 388px) and (max-width: 767px){
        .card-details {
            width: 100%;
        }
    }

    @media screen and (max-width: 387px){
        .card-details {
            width: 100%;
            height: auto;
            flex-direction: column;
        }

        .card-details-img{
            width: 100%;
            height: 100%;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(128, 128, 128, 0.414);
            border-right: none;
        }

        .card-details-img img{
            width: 100%;
        }

        .card-details-info{
            width: 100%;
            height: 250px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    }

</style>