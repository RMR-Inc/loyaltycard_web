<template>
    <main class="main">
        <p>Banner</p>
    </main>
</template>

<script>
    export default {

    }
</script>

<style scoped>
    .main {
        display: flex;
        min-height: 15rem;
        margin-top: 2rem;
        padding: 1rem;
        background: #ccc;
        position: relative;
        z-index: 1;
        clear: both;
    }
    .main p {
        margin: auto;
        color: #555;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
</style>
