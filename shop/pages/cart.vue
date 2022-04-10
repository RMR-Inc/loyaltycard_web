<template>
    <main>
        <h5>Your Items</h5>
        <div class="scroll">
            <div class="items-ctnr">
                <div class="item">
                    <label class="control checkbox" data-dashlane-label="true">
                        <input type="checkbox" checked="" data-dashlane-rid="c1a80be1a3b0426b" data-form-type="other">
                        <span class="control-indicator"></span>
                    </label>
                    <div class="img-ctnr">
                        <img src="https://picsum.photos/180/170" alt="">
                    </div>
                    <div class="infos-ctnr">
                        <h6>Product</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius enim veniam reprehenderit recusandae consequuntur. Magnam doloremque earum dicta exercitationem voluptas.</p>
                        <div class="options-ctnr">
                            <div>
                                <span>Quantity :</span>
                                <select name="quantity" id="">
                                    <option value="1" selected="" disabled="" hidden="">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <a href="" class="btn sm avoid">Remove</a>
                        </div>                        
                    </div>
                    <div class="price">69,99 €</div>
                </div>
                <div class="item">
                    <label class="control checkbox" data-dashlane-label="true">
                        <input type="checkbox" checked="" data-dashlane-rid="c1a80be1a3b0426b" data-form-type="other">
                        <span class="control-indicator"></span>
                    </label>
                    <div class="img-ctnr">
                        <img src="https://picsum.photos/180/170" alt="">
                    </div>
                    <div class="infos-ctnr">
                        <h6>Product</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius enim veniam reprehenderit recusandae consequuntur. Magnam doloremque earum dicta exercitationem voluptas.</p>
                        <div class="options-ctnr">
                            <div>
                                <span>Quantity :</span>
                                <select name="quantity" id="">
                                    <option value="1" selected="" disabled="" hidden="">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <a href="" class="btn sm avoid">Remove</a>
                        </div>                        
                    </div>
                    <div class="price">69,99 €</div>
                </div>
                <div class="item">
                    <label class="control checkbox" data-dashlane-label="true">
                        <input type="checkbox" checked="" data-dashlane-rid="c1a80be1a3b0426b" data-form-type="other">
                        <span class="control-indicator"></span>
                    </label>
                    <div class="img-ctnr">
                        <img src="https://picsum.photos/180/170" alt="">
                    </div>
                    <div class="infos-ctnr">
                        <h6>Product</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius enim veniam reprehenderit recusandae consequuntur. Magnam doloremque earum dicta exercitationem voluptas.</p>
                        <div class="options-ctnr">
                            <div>
                                <span>Quantity :</span>
                                <select name="quantity" id="">
                                    <option value="1" selected="" disabled="" hidden="">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <a href="" class="btn sm avoid">Remove</a>
                        </div>                        
                    </div>
                    <div class="price">69,99 €</div>
                </div>
                <div class="item">
                    <label class="control checkbox" data-dashlane-label="true">
                        <input type="checkbox" checked="" data-dashlane-rid="c1a80be1a3b0426b" data-form-type="other">
                        <span class="control-indicator"></span>
                    </label>
                    <div class="img-ctnr">
                        <img src="https://picsum.photos/180/170" alt="">
                    </div>
                    <div class="infos-ctnr">
                        <h6>Product</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius enim veniam reprehenderit recusandae consequuntur. Magnam doloremque earum dicta exercitationem voluptas.</p>
                        <div class="options-ctnr">
                            <div>
                                <span>Quantity :</span>
                                <select name="quantity" id="">
                                    <option value="1" selected="" disabled="" hidden="">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <a href="" class="btn sm avoid">Remove</a>
                        </div>                        
                    </div>
                    <div class="price">69,99 €</div>
                </div>
            </div>
        </div>
        <div class="buy-ctnr">
            <div>
                <span>Total price : </span>
                <span class="total-price">209,99 €</span>  
            </div>
            <a href="#" class="btn">Order</a>
        </div>
    </main>
</template>

<script>
    export default {

    }
</script>

<style scoped>
    main {
        margin-top: 32px;
    }

    .scroll {
        height: 612px;
        overflow-y: scroll;
    }

    .items-ctnr {
        display: flex;
        flex-direction: column;
    }
    .items-ctnr .item {
        height: 180px;
        margin: 12px 6px;
        border-radius: 6px;
        padding: 0 16px;
        background: var(--white-color);
        display: flex;
        align-items: center;
    }
    .items-ctnr .item > * {
        margin: 0 8px;
    }
    .items-ctnr .item .checkbox {
        margin-top: -8px;
    }
    .items-ctnr .item .img-ctnr {
        width: 180px;
        height: 170px;
    }
    .items-ctnr .item .infos-ctnr {
        width: 450px;
    }
    .items-ctnr .item .infos-ctnr .options-ctnr {
        margin-top: 16px;
        display: flex;
    }
    .items-ctnr .item .infos-ctnr .options-ctnr > * {
        margin: 0 6px;
    }
    .items-ctnr .item .infos-ctnr .options-ctnr select {
        min-width: 70px !important;
    }
    .items-ctnr .item .price {
        margin-left: 16px;
    }

    .buy-ctnr {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
    }
    .buy-ctnr * {
        margin: 4px 0;
    }
    .buy-ctnr .btn{
        width: 150px;
    }
</style>
