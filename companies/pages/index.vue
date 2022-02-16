<template>
    <main class="main">
        <div class="dashboard">
            <div class="card large"></div>
            <div class="card medium"></div>
            <div class="card medium"></div>
        </div>
    </main>
</template>

<script>
    export default {

    }
</script>

<style scoped>
    .main {
        height: calc(100vh - 75px);
        width: calc(100vw - 200px);
	    margin: 75px 0 0 200px;
        background: no-repeat url("https://cdn.loyaltycard.tech/attachments/auth-background.svg");
        background-size: cover;
        background-position: center;
    }

    .dashboard {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .card {
        min-height: 300px;
        border-radius: 15px;
        margin: 20px;
        border: 1px solid;
    }

    .card.large{
        width: 92%;
    }

    .card.medium{
        width: 42%;
    }
</style>
