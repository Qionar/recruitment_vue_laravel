<template>
     <router-view></router-view>
</template>

<script>
export default {

}
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;500;600;700;800&display=swap');

    *{
        font-family: 'Dosis';
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body{
        background: rgba(186, 186, 255, 0.115);
    }

    ::-webkit-scrollbar {
    width: 3px;
    }

    ::-webkit-scrollbar-track {
    background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 3px;
    }
</style>