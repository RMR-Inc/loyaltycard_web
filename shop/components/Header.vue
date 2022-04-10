<template>
    	<header>
			<div class="menu">
				<div class="cat-title">Choose a Category</div>
				<div class="cat">
					<p>Books</p>
					<div>
						<h5>Books</h5>
						<h6>Language</h6>
						<ul>
							<li><a href="#">English</a></li>
							<li><a href="#">Dutch</a></li>
							<li><a href="#">German</a></li>
							<li><a href="#">French</a></li>
							<li><a href="#">Spanish</a></li>
							<li><a href="#">Turkish</a></li>
							<li><a href="#">Arabic</a></li>
						</ul>
					</div>
				</div>
				<div class="cat">
					<p>Computer & Electronics</p>
					<div>
						<h5>Smartphones</h5>
					</div>
				</div>
				<div class="cat">
					<p>Toys</p>
					<div>
						<h5>Brands</h5>
					</div>
				</div>
				<div class="cat">
					<p>Sport & Leisure</p>
					<div>
						<h5>Sport</h5>
					</div>
				</div>
				<div class="cat">
					<p>Home & Cooking</p>
					<div>
						<h5>Cooking</h5>
					</div>
				</div>
				<div class="cat">
					<p>Garden & DIY</p>
					<div>
						<h5>Garden</h5>
					</div>
				</div>
				<div class="cat">
					<p>Gifts</p>
					<div>
						<h5>Gifts</h5>
					</div>
				</div>
				<div class="cat">
					<p>Specials</p>
					<div>
						<h5>Specials</h5>
					</div>
				</div>
			</div>
			<div class="nav">
				<a href="#">Good deals</a>
				<a href="#">Trends</a>
				<a href="#">Specials</a>
				<a href="./cart">Cart <span>(0)</span></a>
			</div>
		</header>
</template>

<script>
    export default {
        
    }
</script>

<style lang="css">
    * {
        box-sizing: border-box;
    }

    a {
        display: block;
        color: var(--black-color);
        text-decoration: none;
    }
    header a:hover {
        color: var(--celadon-blue);
    }

    h5 {
        margin: 8px 0 12px;
        padding-bottom: 8px;
        border-bottom: 1px solid var(--manatee);
    }
    
    h6 {
        margin: 0;
        margin-bottom: 8px;
    }

    .menu {
        display: inline-block;
        border-radius: 3px;
        background: white;
        position: relative;
        z-index: 2;
    }
    .menu:hover {
        box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.5);
        position: absolute;
    }
    .menu:hover > .cat {
        display: block;
    }
    .menu:hover > .cat-title {
        border-color: transparent;
        border-bottom: none;
        border-radius: 3px 3px 0 0;
        background-color: var(--cultured);
        box-shadow: none;
        position: relative;
        z-index: 1;
        color: var(--black-color);
        cursor: default;
    }
    .menu:hover > .cat-title::after {
        content: "⬇️";
    }
    .menu:hover > .cat:last-child {
        border-radius: 0 0 3px 3px;
    }
    .menu:hover + .nav::after {
        display: block;
    }
    .menu > .cat-title,
    .menu > .cat {
        display: none;
        width: 192px;
        margin: 0;
        border-right: 1px solid var(--grey-color);
    }
    .menu > .cat-title {
        display: block;
        padding: 10px;
        border: 1px solid var(--grey-color);
        border-radius: 3px;
        background: white;
        box-shadow: 0 3px 3px -3px rgba(0, 0, 0, 0.5);
        color: var(--celadon-blue);
        font-weight: bold;
        font-size: 14px;
        cursor: pointer;
    }
    .menu > .cat-title::after {
        content: "⬇️";
        float: right;
        font: bold 16px;
    }
    .menu > .cat:hover {
        width: calc(960px - 96px);
        border-right: none;
    }
    
    .cat p {
        width: 192px;
        margin: 0;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-width: 1px 0;
        background: white;
        position: relative;
        z-index: 10;
        font-size: 14px;
        font-weight: normal;
        cursor: default;
    }
    .cat:last-child p {
        border-radius: 0 0 3px 3px;
        color: var(--imperial-red);
    }
    .cat:last-child:hover p {
        border-bottom-color: transparent;
        border-radius: 0 0 0 3px;
    }
    .cat:hover p {
        width: calc(192px + 1px);
        border-color: var(--grey-color);
    }
    .cat:hover div {
        display: block;
    }
    .cat div {
        display: none;
        width: calc(960px - 96px - 192px);
        padding: 16px 19px;
        border-left: 1px solid var(--grey-color);
        border-radius: 0 3px 3px 0;
        background: white;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 192px;
        z-index: 1;
    }

    .nav {
        display: flex;
        width: 72%;
        border-radius: 3px;
        float: right;
        font-size: 14px;
    }
    .nav::after {
        content: "";
        display: none;
        background: rgba(0, 0, 0, 0.35);
        position: fixed;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
    }
    .nav a {
        padding: 10px 0;
        flex: 1;
        text-align: center;
        cursor: pointer;
    }

    .main {
        display: flex;
        width: 100%;
        height: 240px;
        margin-top: 32px;
        padding: 16px;
        background: var(--grey-color);
        position: relative;
        z-index: 1;
        clear: both;
    }
    .main p {
        margin: auto;
        color: var(--grey-color);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    @media (max-width: 960px) {
        .nav {
            width: 67%;
        }
    }
</style>