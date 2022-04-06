<template>
<div>
    <h5>List of products</h5>
    <div class="products-ctnr">
       <a href="#" class="product">
           <div class="top">
               <img src="https://picsum.photos/256/154" alt="">
           </div>
           <div class="bottom">
               <div class="title-price">
                   <h6>Product</h6>
                   <p>119,99 €</p>
               </div>
               <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium dolor iure commodi dolorem maxime!</p>
           </div>
       </a>
       <a href="#" class="product">
           <div class="top">
               <img src="https://picsum.photos/256/154" alt="">
           </div>
           <div class="bottom">
               <div class="title-price">
                   <h6>Product</h6>
                   <p>119,99 €</p>
               </div>
               <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium dolor iure commodi dolorem maxime!</p>
           </div>
       </a>
       <a href="#" class="product">
           <div class="top">
               <img src="https://picsum.photos/256/154" alt="">
           </div>
           <div class="bottom">
               <div class="title-price">
                   <h6>Product</h6>
                   <p>119,99 €</p>
               </div>
               <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium dolor iure commodi dolorem maxime!</p>
           </div>
       </a>
       <a href="#" class="product">
           <div class="top">
               <img src="https://picsum.photos/256/154" alt="">
           </div>
           <div class="bottom">
               <div class="title-price">
                   <h6>Product</h6>
                   <p>119,99 €</p>
               </div>
               <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium dolor iure commodi dolorem maxime!</p>
           </div>
       </a>
       <a href="#" class="product">
           <div class="top">
               <img src="https://picsum.photos/256/154" alt="">
           </div>
           <div class="bottom">
               <div class="title-price">
                   <h6>Product</h6>
                   <p>119,99 €</p>
               </div>
               <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium dolor iure commodi dolorem maxime!</p>
           </div>
       </a>
       <a href="#" class="product">
           <div class="top">
               <img src="https://picsum.photos/256/154" alt="">
           </div>
           <div class="bottom">
               <div class="title-price">
                   <h6>Product</h6>
                   <p>119,99 €</p>
               </div>
               <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium dolor iure commodi dolorem maxime!</p>
           </div>
       </a>
   </div>
</div>
</template>

<script>
    export default {
        
    }
</script>

<style lang="css" scoped>
    .products-ctnr {
        display: grid;
        align-items: center;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));;
    }

    .product {
        margin: 2rem 1rem;
        border-radius: 10px;
        overflow: hidden;
        background: var(--white-color);
    }
    .product .top img {
        object-fit: cover;
        background-position: center;
        width: 100%;
        height: 100%;
    }
    .product .bottom {
        padding: 10px;
    }
    .product .bottom .title-price {
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>