<template>
  <!-- Topbar Start -->
  <div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-8">
                <router-link to="/" class="text-decoration-none">
                    <span class="h1 text-uppercase text-light bg-custom px-2">Multi</span>
                    <span class="h1 text-uppercase text-custom bg-light px-2 ml-n1">Shop</span>
                </router-link>
            </div>
            
            <div class="col-lg-4 col-6 text-right" id="customer_service">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+961 81 086 955</h5>
            </div>
        </div>
    </div>
    
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-custom w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-light m-0"><i class="fa fa-bars mr-2 "></i>Categories</h6>
                    <i class="fa fa-angle-down text-light"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <router-link to="/category/laptops"  class="nav-item nav-link">Laptops</router-link>
                        <router-link to="/category/desktops"  class="nav-item nav-link">Desktops</router-link>
                        <router-link to="/category/playstations"  class="nav-item nav-link">Playstations</router-link>
                        <router-link to="/category/accessories"  class="nav-item nav-link">Accessories</router-link>
                        <router-link to="/category/drones"  class="nav-item nav-link">Drones</router-link>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-custom bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-custom px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <router-link to="/"  class="nav-item nav-link active" @click="closeNavbar">Home</router-link>
                            <router-link to="/shop" class="nav-item nav-link" @click="closeNavbar">Shop</router-link>
                            
                            <div class="nav-item dropdown">
                                <a  class="nav-link dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-custom rounded-0 border-0 m-0" id="pages">
                                    <router-link v-if="userId" :to="'/cart/' + userId" class="dropdown-item" id="cart" @click="closeNavbar">Shopping Cart</router-link>
                                    <router-link v-else to="/auth" class="dropdown-item" id="cart" @click="closeNavbar">Shopping Cart</router-link>
                                    <router-link to="/checkout" class="dropdown-item" id="checkout" @click="closeNavbar">Checkout</router-link>
                                </div>
                            </div>
                            
                            <router-link to="/contact"  class="nav-item nav-link" @click="closeNavbar">Contact</router-link>
                            
                            <!-- Single router-link for small screens when displayButtons is true -->
                            <router-link v-if="displayButtons" :to="cartOrAuthPath" class="nav-item nav-link" @click="closeNavbar">
                                <i class="fas fa-shopping-cart fs-4 text-light mr-1"></i>
                                <span class="badge text-light border border-light rounded-circle" style="padding-bottom: 2px;">
                                    {{ userId ? productsCount : 0 }}
                                </span>
                            </router-link>

                            <router-link to="/auth"  class="btn btn-light" v-if="!auth && displayButtons" @click="closeNavbar">Login / Register</router-link>
                            <button class="btn btn-light mr-2" @click="logout" v-if="auth && displayButtons" >Logout</button>
                        </div>

                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block"> 
                            <router-link to="/auth" class="btn btn-dark ml-2 mr-2" v-if="!auth" @click="closeNavbar" id="login">Login / Register</router-link>
                            <button class="btn btn-dark mr-2" @click="logout" v-if="auth" id="logout">Logout</button>

                            <router-link :to="cartOrAuthPath" class="btn px-0" @click="closeNavbar">
                                <i class="fas fa-shopping-cart fs-4 text-light mr-1"></i>
                                <span class="badge text-light border border-light rounded-circle" style="padding-bottom: 2px; font-size: 1rem">
                                    {{ userId ? productsCount : 0 }}
                                </span>
                            </router-link>

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-left mb-2 mt-2">
            <form @submit.prevent="search">
                <div class="input-group">
                <input ref="input" type="text" class="form-control" placeholder="Search for products" v-model="searchInput" @input="suggestedNames">
                <div class="input-group-append">
                    <span class="input-group-text bg-transparent text-custom">
                    <i class="fa fa-search"></i>
                    </span>
                </div>
                </div>
            </form>

            <ul v-if="showSuggestions" class="list-group">
                <li class="list-group-item" v-for="product in products" :key="product" @click="selectProduct(product)">
                    {{ product }}
                </li>
            </ul>
        </div>
    </div>
    <!-- Navbar End -->

    <router-view></router-view>
</template>

<script>
import axios from 'axios';
export default {

    mounted() {
        this.cartCount();
        
        this.checkAuth();

        // Check screen size when component is mounted
        if (window.innerWidth < 990) {
            this.displayButtons = true; // Set displayButtons to false if screen is less than 992px
        }else {
            this.displayButtons = false; // Set displayButtons to true if screen is 992px or larger
        }
    },
    data() {
        return{
            searchInput: '', // Rename to searchInput
            products: [],
            showSuggestions: false,
            auth: false,
            displayButtons: false,
            userId: '',
            productsCount: 0,
        };
    },
    created(){
        this.cartCount();

        if(localStorage.getItem('auth_id')){
            this.userId = localStorage.getItem('auth_id');
        }
    },
    computed:{
        cartOrAuthPath() {
            return this.userId ? `/cart/${this.userId}` : '/auth';
        }
    },
    methods: {
        closeNavbar() {
            const navbarCollapse = document.querySelector(".navbar-collapse");
                if (navbarCollapse.classList.contains("show")) {
                    navbarCollapse.classList.remove("show");
                }
        },
        search() {
            //Navigate to Gategoriy view with search input without suggestion
            fetch(`http://127.0.0.1:8000/api/getProductCategory/${this.searchInput}`)
                    .then(response => response.json())
                    .then(data => {
                            const category = data.category; // Access category from the response data
                            this.showSuggestions = false;
                            this.$router.push({ path: `/category/${category}` });
                            this.searchInput = '';
                        })
                    .catch(error => console.error('Error fetching category:', error));
            },

        async suggestedNames() {
        // Fetch categories based on search input
            try {
                const response = await fetch(`http://127.0.0.1:8000/api/getProductsNames/${this.searchInput}`);
                const data = await response.json();
                
                this.products = data.productsNames;
                this.showSuggestions = true;
            } catch (error) {
                console.error('Error fetching categories:', error);
                }
            },
            
            selectProduct(product) {
                // Set the search input to the selected product name
                this.searchInput = product;

                // Navigate to the category route when a suggestion is clicked
                fetch(`http://127.0.0.1:8000/api/getProductCategory/${product}`)
                    .then(response => response.json())
                    .then(data => {
                            const category = data.category; // Access category from the response data
                            this.showSuggestions = false;
                            this.$router.push({ path: `/category/${category}` });
                        })
                    .catch(error => console.error('Error fetching category:', error));
            },
            async logout() {
                    try {
                        const token = localStorage.getItem("token");
                        const response = await axios.post("http://127.0.0.1:8000/api/logout",null,
                                {
                                    headers: {
                                        Authorization: `Bearer ${token}`,
                                    },
                                }
                            );
                        if (response.status === 200) {
                            localStorage.removeItem("token");
                            localStorage.removeItem('auth_id');
                            localStorage.removeItem('role');
                            
                            this.userId = '';
                            this.auth = false;
                            this.$router.push("/");
                        }
                    } catch (error) {
                    console.log(error);
                    }
                },
                checkAuth() {
                    if (localStorage.getItem('token')) {
                        this.auth = true;
                    } else {
                        this.auth = false;
                    }
                },

                async cartCount() {
                    const token = localStorage.getItem('token');
                    if (!this.userId || !token) {
                        this.productsCount = 0;
                        return;
                    }
                    try {
                        const response = await axios.get(`http://127.0.0.1:8000/api/count/${this.userId}`, {
                            headers: {
                                'Authorization': `Bearer ${token}`
                            }
                        });
                        this.productsCount = response.data.products_count;
                    } catch (error) {
                        console.log(error);
                        this.productsCount = 0;
                    }
                },
        }
};

</script>

<style>
    #pages{
        background-color: #446084;
    }
    #cart{
        color: aliceblue;
    }
    #cart:hover{
        color: #446084;
    }
    #checkout{
        color: aliceblue;
    }
    #checkout:hover{
        color: #446084;
    }

    #suggestion{
        text-decoration: none
    }

    #suggestion:hover{
        text-decoration: none
    }

    #login{
        border: solid 1px white
    }

    #logout{
        border: solid 1px white
    }
    
</style>
