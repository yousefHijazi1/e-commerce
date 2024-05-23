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
                        <button type="button" class="btn btn-md btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" @click="sortLatest">Latest</button>
                            <button class="dropdown-item" @click="sortTopSellers">Top Sellers</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <router-link :to="{ name: 'details', params: { id: product.id } }" class="col-lg-4 col-md-6 col-sm-6 pb-1" v-for="product in sortedProducts" :key="product.id" id="card">
        <div class="product-item bg-light mb-4">
            <div class="product-img position-relative overflow-hidden">
            <img class="img-fluid w-100" :src="require('@/assets/images/'+ product.image_1 )" alt="">
            </div>
            <div class="text-center py-4">
            <a class="h6 text-decoration-none text-truncate" href="">{{ truncateText(product.description, 30) }}</a>
            <div class="d-flex align-items-center justify-content-center mt-2">
                <h5>${{ product.discount ? product.price - product.discount : Math.trunc(product.price) }}</h5>
                <h6 v-if="product.discount > 0" class="text-muted ml-2"><del>${{ Math.trunc(product.price) }}</del></h6>
            </div>
            <div class="d-flex align-items-center justify-content-center mb-1">
                <small class="fa fa-star text-custom mr-1"></small>
                <small class="fa fa-star text-custom mr-1"></small>
                <small class="fa fa-star text-custom mr-1"></small>
                <small class="fa fa-star text-custom mr-1"></small>
                <small class="fa fa-star text-custom mr-1"></small>
            </div>
            <button class="btn btn-custom px-3 m-2"><i class="fa fa-shopping-cart mr-1"></i></button>
            <button class="btn btn-custom px-3"><i class="fa fa-heart mr-1"></i></button>
            </div>
        </div>
        </router-link>
    </div>
    </div>
    <!-- Shop Product End -->
</template>

<script>
import axios from 'axios';

export default {
    name: 'ProductsComponent',
    
    data() {
        return {
        products: [],
        sortBy: 'latest' // Default sort method
        };
    },
    computed: {
        sortedProducts() {
            let sortedProducts = [...this.products]; // Create a copy of the products array
                if (this.sortBy === 'latest') {
                    sortedProducts.sort((a, b) => new Date(b.date) - new Date(a.date));
                } else if (this.sortBy === 'topSellers') {
                    sortedProducts.sort((a, b) => b.sold_quantity - a.sold_quantity);
                }
            return sortedProducts;
        }
    },
    created() {
        this.getProducts();
    },
    methods: {
        async getProducts() {
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/recentProducts');
                this.products = response.data.recent_products;
                console.log(this.products);
            } catch (error) {
                console.log(error);
            }
        },
        sortLatest() {
            this.sortBy = 'latest';
        },
        sortTopSellers() {
            this.sortBy = 'topSellers';
        },
        truncateText(text, length) {
            return text.length > length ? text.substring(0, length) + ' ...' : text;
        },
    }
};
</script>

<style scoped>
    #card{
        text-decoration: none;
    }
</style>