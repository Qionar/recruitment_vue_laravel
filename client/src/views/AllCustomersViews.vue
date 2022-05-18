<template>
  <div class="customers-page-wrapper">
    <nav-bar @search="filterCustomers" @openModal="isModalOpen=true"></nav-bar>
    <customers-list v-if="customers.length > 0"  :customers="customers"></customers-list>
    <div v-else class="customers-loading-handler">
      <div v-if="isFetching === false" class="customers-not-found">
        Customers Not Found.
      </div>
      <div v-else class="customers-loader"></div> 
    </div>
    <modal-create v-if="isModalOpen === true" @closeModal="isModalOpen=false" @addNewCustomer="addNewCustomer"/>
  </div>
</template>

<script>

import axios from "axios";

import CustomersList from '@/components/CustomersList.vue';
import NavBar from '@/components/NavBar.vue';
import ModalCreate from '@/components/ModalCreate.vue';

export default {
  components: {
    CustomersList, NavBar, ModalCreate
  },
  data() {
    return {
        isFetching: false,
        responseData: [],
        customers: [],
        isModalOpen: false
    }
  },
  methods: {
    async fetchCustomers(){
      try {
        this.isFetching = true;
        setTimeout(async () => {
          const response = await axios.get(import.meta.env.VITE_SERVER_HOST + '/api/customers');
          this.responseData = response.data;
          this.customers = response.data;
          this.isFetching = false;
        }, 1000);
      } catch (error) {
        // redirect to 500 error page
      }
    },
    filterCustomers(searchInput){
      
      this.customers = this.responseData;

      this.customers = this.customers.filter((v) => {
        let fullName = v.name + " " + v.surname;
        if(fullName.includes(searchInput)){
          return v;
        }
      })

    },
    addNewCustomer(customer){
      this.fetchCustomers();
    }
  },
  mounted(){
    this.fetchCustomers();
  }
}
</script>

<style>
  .customers-page-wrapper{
    width: 100%;
    padding: 20px;
  }


  .customers-loading-handler{
    width: 100%;
    height: 100vh;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .customers-loader{
    width: 100px;
    height: 100px;
    border: 6px solid rgb(0, 162, 255);
    border-right: 6px solid rgba(0, 162, 255, 0.29);
    border-radius: 50%;
    animation-name: customers-loading-animation;
    animation-duration: 1s;
    animation-iteration-count: infinite;
  }

  @keyframes customers-loading-animation {
    0%{
      transform: rotate(0deg) scale(0.9);
    }
    100%{
      transform: rotate(360deg) scale(1);
    }
  }

  .customers-not-found{
    font-size: 40px;
  }

</style>