<template>
    <!-- Shop Product Start -->
    <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                        </div>
                        <div class="ml-2">
                            <div class="btn-group">
                                <button type="button" class="btn btn-md btn-light dropdown-toggle" data-toggle="dropdown">{{ this.sortBy }}</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" @click="sortLatest">Latest</button>
                                    <button class="dropdown-item" @click="sortTopSellers">Top Sellers</button>
                                    <!-- <button class="dropdown-item" href="#">Best Rating</button> -->
                                </div>
                            </div>
                            <!-- <div class="btn-group ml-2">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">10</a>
                                    <a class="dropdown-item" href="#">20</a>
                                    <a class="dropdown-item" href="#">30</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div   class="col-lg-4 col-md-6 col-sm-6 pb-1" v-for="product in sortedProducts" :key="product.id" id="card" >
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <router-link :to="{ name: 'details', params: { id: product.id } }">
                                <img class="img-fluid w-100" :src="require('@/assets/images/'+ product.image_1 )" alt="product img" style="height: 260px;">
                            </router-link>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">{{ truncateText(product.description, 30) }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>${{ product.discount ? product.price - product.discount/100 * product.price : Math.trunc(product.price) }}</h5>
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
                </div >

                <div v-if="message">
                    <h1>{{ message }}</h1>
                </div>

                <!-- <div class="col-12">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div> -->
            </div>
            <Notification ref="notification" message="Product added to cart successfully !" />
        </div>
        <!-- Shop Product End -->

</template>
<script>
import axios from 'axios';
import Notification from '@/components/Notification.vue';

export default {
name:'ProductsByCategories',
components:{
Notification
},
data(){
    return{
        products:[],
        message: '',
        sortBy: 'Latest' // Default sort method
    }
},
computed: {
    sortedProducts() {
            // Filter products based on maxPrice
            let filteredProducts = this.products.filter(product => product.price <= this.maxPrice);

            // Sort the filtered products
            if (this.sortBy === 'Latest') {
                filteredProducts.sort((a, b) => new Date(b.date) - new Date(a.date));
            } else if (this.sortBy === 'Top Sellers') {
                filteredProducts.sort((a, b) => b.sold_quantity - a.sold_quantity);
            }

            return filteredProducts;
        },
    },
props: {
        category: {
            type: String,
            required: true
        },
        maxPrice: {
            type: Number,
            required: true
        },
        
    },

created(){
    this.getProducts();
},

methods:{
        async getProducts(){
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/products/category/'+this.category);
                this.products = response.data.products
                console.log(this.products)
            } catch (error) {
                this.message = "There's no any products with this name";
                console.log(error)
            }
        },

        

        sortLatest() {
            this.sortBy = 'Latest';
        },
        sortTopSellers() {
            this.sortBy = 'Top Sellers';
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
#favorite:hover{
    color:red;
}
.product-item .text-center a {
        display: block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
</style>