<template>
    <div class="main">
        <LCLogo/>
        <ForgotPasswordCard/>
    </div>
</template>

<script>
    export default {
        head: () => ({
            title: "Password Recovery - LoyaltyCard"
        })
    }
</script>

<style lang="css" scoped>
    .main {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100vw;
        background: no-repeat url("https://cdn.loyaltycard.tech/attachments/auth-background.svg");
        background-size: cover;
        background-position: center;
    }

    .main .logo {
        position: absolute;
        top: 0;
        left: 0;
        padding: 16px 24px;
        max-width: 144px;
    }

    .main .logo img {
        max-width: 144px;
    }
</style>
