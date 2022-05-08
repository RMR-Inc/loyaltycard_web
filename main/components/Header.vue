<template>
    	<header>
			<LCLogo/>
            <nav>
                <a href="#">Qui sommes-nous ?</a>
                <a href="#">Contact</a>
                <a href="https://shop.loyaltycard.tech/">Shop</a>
                <a class="btn" href="https://auth.loyaltycard.tech/">Se connecter</a>
            </nav>
		</header>
</template>

<script>
    export default {
        
    }
</script>

<style lang="css" scoped>
   header {
       position: relative;
       height: 75px;
       display: flex;
       justify-content: space-around;
       align-items: center;
   }
   header nav {
       width: 500px;
       display: flex;
       justify-content: space-between;
       align-items: center;
   }
</style>