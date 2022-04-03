<template>
    	<header>
			<div class="menu">
				<div class="cat-title">Choose a Category</div>
				<div class="cat">
					<h3>Books</h3>
					<div>
						<h4>Books</h4>
						<h5>Language</h5>
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
					<h3>Computer & Electronics</h3>
					<div>
						<h4>Smartphones</h4>
					</div>
				</div>
				<div class="cat">
					<h3>Toys</h3>
					<div>
						<h4>Brands</h4>
					</div>
				</div>
				<div class="cat">
					<h3>Sport & Leisure</h3>
					<div>
						<h4>Sport</h4>
					</div>
				</div>
				<div class="cat">
					<h3>Home & Cooking</h3>
					<div>
						<h4>Cooking</h4>
					</div>
				</div>
				<div class="cat">
					<h3>Garden & DIY</h3>
					<div>
						<h4>Garden</h4>
					</div>
				</div>
				<div class="cat">
					<h3>Gifts</h3>
					<div>
						<h4>Gifts</h4>
					</div>
				</div>
				<div class="cat">
					<h3>Specials</h3>
					<div>
						<h4>Specials</h4>
					</div>
				</div>
			</div>
			<div class="nav">
				<a href="#">Good deals</a>
				<a href="#">Trends</a>
				<a href="#">Specials</a>
				<a href="#">Cart (0)</a>
			</div>
		</header>
</template>

<script>
    export default {
        
    }
</script>

<style lang="css" scoped>
    * {
        box-sizing: border-box;
    }

    ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }

    a {
    display: block;
    padding: 0.2rem 0;
    color: #000;
    font-size: 0.875rem;
    text-decoration: none;
    }
    a:hover {
    color: #51b5d6;
    text-decoration: underline;
    }

    h4 {
    margin: 0.5rem 0 0.75rem;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid #ddd;
    font-size: 1.25rem;
    font-weight: normal;
    }

    h5 {
    margin: 0;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
    }

    nav::after {
    content: "";
    display: block;
    clear: both;
    }

    .menu {
        display: inline-block;
        border-radius: 0.2rem;
        background: #fff;
        position: relative;
        z-index: 2;
    }
    .menu:hover {
        box-shadow: 0 0 0.35rem 0 rgba(0, 0, 0, 0.5);
        position: absolute;
    }
    .menu:hover > .cat {
        display: block;
    }
    .menu:hover > .cat-title {
        border-color: transparent;
        border-bottom: none;
        border-radius: 0.2rem 0.2rem 0 0;
        background-color: #eee;
        box-shadow: none;
        position: relative;
        z-index: 1;
        color: #444;
        cursor: default;
    }
    .menu:hover > .cat-title::after {
        content: "⬇️";
    }
    .menu:hover > .cat:last-child {
        border-radius: 0 0 0.2rem 0.2rem;
    }
    .menu:hover + .nav::after {
        display: block;
    }
    .menu > .cat-title,
    .menu > .cat {
        display: none;
        width: 12rem;
        margin: 0;
        border-right: 1px solid #bbb;
    }
    .menu > .cat-title {
        display: block;
        padding: 0.65rem;
        border: 1px solid #bbb;
        border-radius: 0.2rem;
        background: #fff;
        box-shadow: 0 3px 3px -3px rgba(0, 0, 0, 0.5);
        color: #51b5d6;
        font-weight: bold;
        font-size: 0.875rem;
        cursor: pointer;
    }
    .menu > .cat-title::after {
        content: "⬇️";
        float: right;
        font: bold 1rem;
    }
    .menu > .cat:hover {
        width: calc(960px - 6rem);
        border-right: none;
    }
    /* .menu > .cat:hover::before {
        content: "";
        display: block;
        width: 12rem;
        height: 3rem;
        border: 1px solid transparent;
        position: absolute;
        top: 0;
        z-index: 10;
    } */

    .cat h3 {
        width: 12rem;
        margin: 0;
        padding: 0.65rem 0.75rem;
        border: 1px solid transparent;
        border-width: 1px 0;
        background: #fff;
        position: relative;
        z-index: 10;
        font-size: 0.875rem;
        font-weight: normal;
        cursor: default;
    }
    .cat:last-child h3 {
        border-radius: 0 0 0.2rem 0.2rem;
        color: darkred;
    }
    .cat:last-child:hover h3 {
        border-bottom-color: transparent;
        border-radius: 0 0 0 0.2rem;
    }
    .cat:hover h3 {
        width: calc(12rem + 1px);
        border-color: #bbb;
    }
    .cat:hover div {
        display: block;
    }
    .cat div {
        display: none;
        width: calc(960px - 6rem - 12rem);
        padding: 1rem 1.2rem;
        border-left: 1px solid #bbb;
        border-radius: 0 0.2rem 0.2rem 0;
        background: #fff;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 12rem;
        z-index: 1;
    }

    .nav {
        display: flex;
        width: 72%;
        border-radius: 0.2rem;
        float: right;
        font-size: 0.875rem;
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
        padding: 0.65rem 0;
        flex: 1;
        text-align: center;
        cursor: pointer;
    }

    .main {
        display: flex;
        width: 100%;
        height: 15rem;
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

    @media (max-width: 60rem) {
        .nav {
            width: 67%;
        }
    }
</style>