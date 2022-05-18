<template>
  <div class="search-area-wrapper">
      <input type="text" placeholder=" Search customers by name ..." v-model="searchInput" @input="searchHandler">
  </div>
</template>

<script>
export default {
    data() {
        return{
            searchInput: ''
        }
    },
    methods: {
        searchHandler() {
            this.$emit('search', this.searchInput);
        }
    }
}
</script>

<style>
    .search-area-wrapper{
        width: 60%;
    }

    .search-area-wrapper input{
        width: 100%;
        height: 60px;
        border: 0px;
        font-size: 25px;
        padding: 0px 20px;
        border-radius: 10px;
        -webkit-box-shadow: 0px 5px 24px -20px rgba(66, 68, 90, 1);
        -moz-box-shadow: 0px 5px 24px -20px rgba(66, 68, 90, 1);
        box-shadow: 0px 5px 24px -20px rgba(66, 68, 90, 1);
        transition: .3s linear;
    }

    .search-area-wrapper input:focus{
        outline: 0;
        -webkit-box-shadow: 0px 5px 24px -10px rgba(66, 68, 90, 1);
        -moz-box-shadow: 0px 5px 24px -10px rgba(66, 68, 90, 1);
        box-shadow: 0px 5px 24px -10px rgba(66, 68, 90, 1);
    }
</style>