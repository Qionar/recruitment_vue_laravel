<template>
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>    
</template>

<script>
    export default{

    }
</script>

<style>
    .loader-wrapper{
        width: 50%;
        height: 50vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        -webkit-box-shadow: 0px 5px 24px -20px rgba(66, 68, 90, 1);
        -moz-box-shadow: 0px 5px 24px -20px rgba(66, 68, 90, 1);
        box-shadow: 0px 5px 24px -20px rgba(66, 68, 90, 1);
    }

    .loader{
        width: 100px;
        height: 100px;
        border: 6px solid rgba(0, 170, 255, 0.5);
        border-right: 6px solid rgba(0, 170, 255, 0.1);
        border-radius: 50%;
        animation-name: loading;
        animation-duration: 3s;
        animation-iteration-count: infinite;
    }

    @keyframes loading {
        0%{
            transform: rotate(0deg) scale(0.9);
        }
        100%{
            transform: rotate(360deg) scale(1);
        }
    }
</style>