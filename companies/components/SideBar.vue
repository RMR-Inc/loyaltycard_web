<template>
    <aside class="navigation">
			<ul>
				<li><a href="#">Corp 1</a></li>
				<li><a href="#">Corp 2</a></li>
				<li><a href="#">Corp 3</a></li>
				<li><a href="#">Corp 4</a></li>
				<li><a href="#">Corp 5</a></li>
			</ul>

            <a class="add-corp btn xl spc-btwn" href="./add-corp">
                <img src="https://cdn.loyaltycard.tech/icons/System/add-fill-light.svg" alt="" class="icn" draggable="false">
                Add corporation
            </a>
	</aside>
</template>

<script>
    export default {
        
    }
</script>

<style lang="css" scoped>
    .navigation {
        position: fixed;
        width: 200px;
        top: 75px;
        bottom: 0px;
        background: var(--oxford-blue);
        color: var(--cultured);
    }

    .navigation li:before{
        color: var(--manatee);
    }

    .navigation li {
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        display: flex;
        align-items: center;
    }

    .navigation li a {
        color: var(--manatee);
        text-decoration: none;
        display: block;
        padding: 0.7em;
    }

    .navigation li:hover {
        background-color: rgba(255, 255, 255, 0.05);
        color: var(--cultured);
    }

    .add-corp {
        position: absolute;
        bottom: 0;
    }
</style>