<template>
  <!-- Topbar Start -->
  <div class="container-fluid">
        <div class="row  py-1 px-xl-5" style="background-color: #F5F5F5;">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">About</a>
                    <a class="text-body mr-3" href="">Contact</a>
                    <a class="text-body mr-3" href="">Help</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <!-- <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">Sign in</button>
                            <button class="dropdown-item" type="button">Sign up</button>
                        </div> -->
                        <router-link to="/auth" class="btn btn-light mr-2" >Login / Register</router-link>
                    </div>
                    <!-- <div class="btn-group mx-2">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">USD</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">EUR</button>
                            <button class="dropdown-item" type="button">GBP</button>
                            <button class="dropdown-item" type="button">CAD</button>
                        </div>
                    </div> -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">English</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">Arabic</button>
                            <!-- <button class="dropdown-item" type="button">FR</button> -->
                            <!-- <button class="dropdown-item" type="button">RU</button> -->
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        
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
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Laptops </a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="" class="dropdown-item">Gaming Laptops</a>
                                <a href="" class="dropdown-item">New Laptops</a>
                                <a href="" class="dropdown-item">Refurbished Laptops</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown dropright">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Desktops </a>
                            <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                <a href="" class="dropdown-item">Gaming PC</a>
                                <a href="" class="dropdown-item">New PC</a>
                                <a href="" class="dropdown-item">Used PC</a>
                            </div>
                        </div>
                        <router-link to="/category/playstations"  class="nav-item nav-link">Playstations</router-link>
                        <router-link to="/category/accessories"  class="nav-item nav-link">Accessories</router-link>
                        
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
                            <div v-if="displayCategories" class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Categories <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-custom rounded-0 border-0 m-0">
                                        <!-- <a href="" class="dropdown-item"></a> -->
                                        
                                        <router-link to="/category/playstations"  class="dropdown-item">Playstations</router-link>
                                        <router-link to="/category/accessories"  class="dropdown-item">Accessories</router-link>
                                        
                                        <div class=" dropdown-item">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laptops <i class="fa fa-angle-down mt-1"></i></a>
                                            <div class="dropdown-menu bg-custom rounded-0 border-0 m-0">
                                                    <!-- <a href="" class="dropdown-item"></a> -->
                                                    
                                                    <a href="" class="dropdown-item">Used Laptops</a>
                                                    <a href="" class="dropdown-item">Refurbished Laptops</a>
                                                    
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <router-link to="/"  class="nav-item nav-link active">Home</router-link>
                            
                            <router-link to="/shop" class="nav-item nav-link">Shop</router-link>
                            
                            
                            
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-custom rounded-0 border-0 m-0" id="pages">
                                    <router-link to="/cart"  class="dropdown-item" id="cart">Shopping Cart</router-link>
                                    <router-link to="/checkout" class="dropdown-item" id="checkout">Checkout</router-link>
                                </div>
                            </div>
                            <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
                            <router-link to="/contact"  class="nav-item nav-link active">Contact</router-link>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="" class="btn px-0">
                                <i class="fas fa-heart text-light mr-1"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-light mr-1"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div class="mb-2 mt-2">
        <div class="col-lg-12 col-md-12 col-sm-12 text-left">
            <form @submit.prevent="search">
                <div class="input-group">
                <input ref="input" type="text" class="form-control" placeholder="Search for products" v-model="searchInput" @input="fetchCategories">
                <div class="input-group-append">
                    <span class="input-group-text bg-transparent text-custom">
                    <i class="fa fa-search"></i>
                    </span>
                </div>
                </div>
            </form>
            <ul v-if="showSuggestions" class="list-group">
                <router-link id="suggestion" v-for="category in categories" :key="category" :to="'/category/' + category" class="list-group-item">{{ category }}</router-link>
            </ul>
        </div>
    </div>
    <!-- Navbar End -->

    <router-view>

    </router-view>
</template>

<script>
export default {
    mounted() {
        // Check screen size when component is mounted
        if (window.innerWidth < 990) {
            this.displayCategories = true; // Set displayCategories to false if screen is less than 992px
        } else {
            this.displayCategories = false; // Set displayCategories to true if screen is 992px or larger
        }
    },
    data() {
    return {
        searchInput: '', // Rename to searchInput
        categories: [],
        showSuggestions: false
    };
},
methods: {
    search() {
        // Navigate to the category route
        console.log(this.searchInput); // Ensure the value is logged correctly
        this.$router.push({ path: `/category/${this.searchInput}` });
        this.searchInput = '';
        this.showSuggestions = false
    },
    async fetchCategories() {
    // Fetch categories based on search input
    try {
        const response = await fetch(`http://127.0.0.1:8000/api/getCategories/${this.searchInput}`);
        const data = await response.json();
        console.log(data);
        this.categories = data.categories;
        this.showSuggestions = true;
    } catch (error) {
        console.error('Error fetching categories:', error);
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
    
</style>
