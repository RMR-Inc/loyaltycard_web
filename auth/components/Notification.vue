<template>
    <div :class="`notification ${notification.type} ${notification.hide ? 'hide' : ''}`">
        <img :src="`https://cdn.loyaltycard.tech/icons/Notifications/${notification.type}-fill.svg`" class="icn"/>
        <p>{{notification.content}}</p>
    </div>
</template>

<script>
    export default {
        props: ['notification'],
    }
</script>

<style lang="css" scoped>
    .notification {
        min-width: 256px;
        max-width: 512px;
        padding: 8px 16px;
        margin-top: 16px;
        background: var(--white-color);
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        border-radius: 12px;
        animation: notificationAppear .4s ease 1;
        pointer-events: none;
        box-shadow: 0 5px 10px rgba(154,160,185,0.05), 0 15px 40px rgba(166,173,201,0.2);
    }

    .notification.hide {
        animation: notificationHidding .8s ease 1;
    }

    .notification .icn {
        width: 18px;
        height: 18px;
        margin: 1px 12px 0 0;
    }
</style>
