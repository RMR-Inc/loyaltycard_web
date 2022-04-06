<template>
    <main>
        <div class="banner">
            <p>Banner</p>
        </div>
        <Products/>
    </main>
</template>

<script>
    export default {

    }
</script>

<style scoped>
    .banner {
        display: flex;
        min-height: 15rem;
        margin: 2rem 0;
        padding: 1rem;
        background: var(--cultured);
        position: relative;
        z-index: 1;
        clear: both;
    }
    .banner p {
        margin: auto;
        color: var(--grey-color);
        text-transform: uppercase;
        letter-spacing: 1px;
    }
</style>
