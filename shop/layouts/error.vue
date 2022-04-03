<template>
    <div class="error-page">
        <LCLogo/>
        <h1>Erreur {{error.statusCode}}</h1>
        <span v-if="error.statusCode === 404">Whoops ! Page not found...</span>
        <span v-else>Hmmm that's embarrassing...<br>An error has occured !</span>
    </div>
</template>

<script>
    export default {
        props: ['error'],
    }
</script>

<style scoped>
    .error-page {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100vw;
        background: no-repeat url("https://cdn.loyaltycard.tech/attachments/auth-background.svg");
        background-size: cover;
        background-position: center;
    }

    .error-page > span {
        font-size: 48px;
    }
</style>
