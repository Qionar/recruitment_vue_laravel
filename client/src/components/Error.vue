<template>
  <div class="error-wrapper">
      <div class="error">
          <p class="error-code">
              {{ code }}
          </p>
          <p class="error-message">
              {{ message }}
          </p>
      </div>
      <router-link to="/" class="error-link">Go to main page</router-link>
  </div>
</template>

<script>
export default {
    props:{
        code:{
            type: Number,
            default: 500
        },
        message:{
            type: String,
            default: 'Internal Server Error.'
        }
    }
}
</script>

<style>
    .error-wrapper {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .error-code {
        font-size: 70px;
        color: rgb(0, 162, 255);
    }

    .error-link{
        position: absolute;
        bottom: 20px;
        color: rgb(255, 64, 0);
        font-size: 30px;
    }

    .error-link:hover{
        text-decoration: none;
    }

</style>