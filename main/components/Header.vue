<template>
    	<header>
			<LCLogo/>
            <nav>
                <a href="">À propos de nous</a>
                <a href="">Contact</a>
                <a href="">Shop</a>
                <a class="btn" href="">Se connecter</a>
            </nav>
		</header>
</template>

<script>
    export default {
        
    }
</script>

<style lang="css" scoped>
   header {
       background: rebeccapurple;
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