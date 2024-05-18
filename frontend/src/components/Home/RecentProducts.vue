<template lang="">
    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Recent Products</span></h2>
        <div class="row px-xl-5">
            <router-link :to="{ name: 'details', params: { id: product.id } }" v-for="product in recent_products" :key="product.id" class="col-lg-3 col-md-4 col-sm-6 pb-1" id="card">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" :src="require('@/assets/images/'+ product.image_1 )" alt="">
                        <!-- <div class="product-action">
                        </div> -->
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">{{ product.name }}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>${{ product.discount ? product.price - product.discount : product.price }}</h5>
                            <h6 v-if="product.discount > 0" class="text-muted ml-2"><del>${{ Math.trunc(product.price) }}</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-custom mr-1"></small>
                            <small class="fa fa-star text-custom mr-1"></small>
                            <small class="fa fa-star text-custom mr-1"></small>
                            <small class="fa fa-star text-custom mr-1"></small>
                            <small class="fa fa-star text-custom mr-1"></small>
                            <small>(99)</small>
                        </div>
                        <button class="btn btn-custom px-3 m-2"><i class="fa fa-shopping-cart mr-1"></i></button>
                        <button class="btn btn-custom px-3"><i class="fa fa-heart mr-1"></i></button>
                    </div>
                </div>
            </router-link>
        </div>
    </div>
    <!-- Products End -->
</template>

<script>

import axios from 'axios';
export default {
    name:'RecentProducts',
    data(){
        return{
            recent_products:[],
            message: ''
        }
    },
    created(){
        this.getRecents();
    },
    methods:{
        async getRecents(){
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/recentProducts');
                this.recent_products = response.data.recent_products
                console.log(this.products)
            } catch (error) {
                console.log(error)
            }
        },
    }
}
</script>
<style scoped>
    #card{
        text-decoration:none
    }
</style>