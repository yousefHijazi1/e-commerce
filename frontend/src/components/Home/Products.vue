<template lang="">
    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-light pr-3">Featured Products</span></h2>
        <div class="row px-xl-5">
            <div class="row px-xl-5">
                <router-link :to="{ name: 'details', params: { id: product.id } }" v-for="product in displayedProducts" :key="product.id" class="col-lg-3 col-md-4 col-sm-6 pb-1" id="card">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100 " :src="require('@/assets/images/'+ product.image_1 )" alt="">
                            <!-- <div class="product-action">
                            </div> -->
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">{{ truncateText(product.description, 30) }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>${{ product.discount ? product.price - product.discount :Math.trunc(product.price) }}</h5>
                                <h6 v-if="product.discount > 0" class="text-muted ml-2"><del>${{ Math.trunc(product.price) }}</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-custom mr-1"></small>
                                <small class="fa fa-star text-custom mr-1"></small>
                                <small class="fa fa-star text-custom mr-1"></small>
                                <small class="fa fa-star text-custom mr-1"></small>
                                <small class="fa fa-star text-custom mr-1"></small>
                                <!-- <small>(99)</small> -->
                            </div>
                            <button class="btn btn-custom px-3 m-2"><i class="fa fa-shopping-cart mr-1"></i>Add to cart</button>
                            
                        </div>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
    <!-- Products End -->
</template>
<script>

import axios from 'axios';
export default {
    name:'AllProducts',
    data(){
        return{
            products:[],
            message: ''
        }
    },
    computed: {
        displayedProducts() {
            // Slice the recent_products array to contain only the first 8 items
            return this.products.slice(0, 8);
        }
    },
    created(){
        this.getProducts();
    },
    methods:{
        async getProducts(){
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/allProducts');
                this.products = response.data.products
                console.log(this.products)
            } catch (error) {
                console.log(error)
            }
        },
        truncateText(text, length) {
            return text.length > length ? text.substring(0, length) + ' ...' : text;
        },
    }
}
</script>
<style scoped>
    #card{
        text-decoration:none
    }
</style>