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
            <div class="row px-xl-5">
                <div  v-for="product in displayedProducts" :key="product.id" class="col-lg-3 col-md-4 col-sm-6 pb-1" id="card">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <router-link :to="{ name: 'details', params: { id: product.id } }">
                                <img class="img-fluid w-100 " :src="require('@/assets/images/'+ product.image_1 )" style="height:240px" alt="product img">
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
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-custom mr-1"></small>
                                <small class="fa fa-star text-custom mr-1"></small>
                                <small class="fa fa-star text-custom mr-1"></small>
                                <small class="fa fa-star text-custom mr-1"></small>
                                <small class="fa fa-star text-custom mr-1"></small>
                                <!-- <small>(99)</small> -->
                            </div>
                            <button class="btn btn-custom px-3 m-2" @click="addToCart(product.id)"><i class="fa fa-shopping-cart mr-1"></i>Add to cart</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Notification ref="notification" message="Product added to cart successfully !" />
    </div>
    <!-- Products End -->
</template>
<script>

import axios from 'axios';
import Notification from '@/components/Notification.vue';
export default {
    name:'AllProducts',
    components:{
        Notification
    },
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
        addToCart(productId) {
            const userId = localStorage.getItem('auth_id'); // Assuming you store the auth_id in localStorage
            const token = localStorage.getItem('token'); // Assuming you store the token in localStorage

            if (!userId) {
                this.$router.push({ path: '/auth', query: { message: 'You must login to add products to cart' }});
                console.log('not authenticated')
            } else {
                console.log(userId);
                const payload = {
                    user_id: userId,
                    product_id: productId,
                    quantity: 1 // You can change this based on your needs
                };

                axios.post('http://127.0.0.1:8000/api/cart', payload, {
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                .then(() => {
                    console.log('Product added to cart successfully');
                    this.$refs.notification.show();
                })
                .catch(error => {
                    console.error('Error adding product to cart:', error);
                    alert('Failed to add product to cart');
                });
            }
        }
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