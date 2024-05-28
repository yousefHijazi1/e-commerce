<template lang="">
    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">        
        <div class="d-flex justify-content-between align-items-center mx-xl-5 mb-4">
            <h2 class="section-title position-relative text-uppercase mb-0" id="recent-products-title" >
                <span class="bg-light pr-3">Recent Products</span>
            </h2>
            <router-link to="/shop" class="bg-light text-custom p-2" id="view">View All Products</router-link>
        </div>
        <div class="row px-xl-5">
            <div  v-for="product in displayedProducts" :key="product.id" class="col-lg-3 col-md-4 col-sm-6 pb-1" id="card">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <router-link :to="{ name: 'details', params: { id: product.id } }">
                            <img class="img-fluid w-100" :src="require('@/assets/images/'+ product.image_1 )" style="height:240px"  alt="product image">
                        </router-link>
                        
                        <!-- <div class="product-action">
                        </div> -->
                    </div>
                    <div class="text-center py-4">
                        <p class="h6 text-decoration-none text-truncate">{{ truncateText(product.description, 30) }}</p>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>${{ product.discount ? product.price - product.discount/100 * product.price : Math.trunc(product.price)  }}</h5>
                            <h6 v-if="product.discount > 0" class="text-muted ml-2"><del>${{ Math.trunc(product.price) }}</del></h6>
                        </div>
                        <button class="btn btn-custom px-3 m-2"><i class="fa fa-shopping-cart mr-1"></i>Add to cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
    <hr>
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

    computed: {
        displayedProducts() {
            // Slice the recent_products array to contain only the first 8 items
            return this.recent_products.slice(0, 8);
        }
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
    
/* Custom styles for responsive title */
#recent-products-title {
  font-size: 2rem; /* Default font size */
}

@media (max-width: 768px) {
    #recent-products-title {
        font-size: 1.5rem; /* Font size for small screens */
    }
}

@media (max-width: 576px) {
    #recent-products-title {
        font-size: 1.25rem; /* Font size for extra small screens */
    }
    #view{
        font-size: 1.2rem;
    }
}

</style>