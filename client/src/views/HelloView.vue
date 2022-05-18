<template>
  <div class="hello-wrapper">
      <h1 class="hello-text">
          Welcome to the Simple SPA.
      </h1>
      <router-link to="/customers" class="hello-link"> Show all customers </router-link>
  </div>
</template>

<script>
export default {

}
</script>

<style>
    .hello-wrapper {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        text-align: center;
    }

    .hello-text{
        color: rgb(0, 162, 255);
        font-size: 50px;
    }

    .hello-link{
        position: absolute;
        bottom: 20px;
        color: rgb(255, 64, 0);
        font-size: 30px;
    }

    .hello-link:hover{
        text-decoration: none;
    }
</style>