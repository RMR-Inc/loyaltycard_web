<template>
    	<header class="banner">
			<h4>Referring user</h4>
			<ul class="utilities">
				<a href="#">My Account</a>
				<a href="#">Log Out</a>
			</ul>
		</header>
</template>

<script>
    export default {
        
    }
</script>

<style lang="css" scoped>
    .banner {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 99;
        height: 75px;
        background: var(--oxford-blue);
        color: var(--cultured);
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.15);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .banner h4 {
        margin-left: 15px;
    }

    .banner .utilities a {
        padding: 0.5em 1em;
        color: var(--cultured);
    }
</style>