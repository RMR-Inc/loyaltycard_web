<template>
    <main class="main">
        <CorpCard/>
    </main>
</template>

<script>
    export default {

    }
</script>

<style scoped>
    .main {
        display: flex;
        justify-content: center;
        align-items: center;
        height: calc(100vh - 75px);
        width: calc(100vw - 200px);
	    margin: 75px 0 0 200px;
        background: no-repeat url("https://cdn.loyaltycard.tech/attachments/auth-background.svg");
        background-size: cover;
        background-position: center;
    }
</style>