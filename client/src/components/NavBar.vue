<template>
    <div class="navbar-wrapper">
        <search-area @search="searchHandler"></search-area>
        <button class="nav-add-button" @click="modalHandler">Add new Customer</button>
    </div>
</template>

<script>
    import SearchArea from '@/components/SearchArea.vue';

export default {
    components: {
        SearchArea
    },
    methods: {
        searchHandler(searchInput){
            this.$emit('search', searchInput);
        },
        modalHandler(){
            // open modal window...
        }
    }
}
</script>

<style>
    .navbar-wrapper{
        width: 100%;
        height: 100px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .nav-add-button{
        width: 35%;
        height: 60px;
        font-size: 25px;
        padding: 0px 20px;
        border-radius: 10px;
        border: none;
        background: rgb(24, 151, 255);
        color: #fff;
        -webkit-box-shadow: 0px 5px 24px -20px rgba(66, 68, 90, 1);
        -moz-box-shadow: 0px 5px 24px -20px rgba(66, 68, 90, 1);
        box-shadow: 0px 5px 24px -20px rgba(66, 68, 90, 1);
        cursor: pointer;
        transition: .3s linear;
    }

    .nav-add-button:hover{
        -webkit-box-shadow: 0px 5px 24px -10px rgba(66, 68, 90, 1);
        -moz-box-shadow: 0px 5px 24px -10px rgba(66, 68, 90, 1);
        box-shadow: 0px 5px 24px -10px rgba(66, 68, 90, 1);
    }
</style>