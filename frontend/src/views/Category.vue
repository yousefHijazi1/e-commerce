<template>
    
    <BreadCrumb :category="category"/>
        <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Filter -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Filter by price</span></h5>
                <div class="bg-light p-4 mb-30">
                    <label for="customRange1" class="form-label">Price range: {{ maxPrice }}$</label>
                    <input type="range" class="form-range" id="customRange1" v-model="maxPrice" min="0" max="1000">
                </div>
                <!-- Price End -->
                
                <!-- Shipping Filter -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Filter by shipping</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="color-all">
                            <label class="custom-control-label" for="price-all">All Shipping </label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-1">
                            <label class="custom-control-label" for="color-1">Free Shipping</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-2">
                            <label class="custom-control-label" for="color-2">Fast Shipping</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                    </form>
                </div>
                <!-- Shipping End -->

                <!-- Size Start -->
                <!-- <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Filter by size</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="size-all">
                            <label class="custom-control-label" for="size-all">All Size</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-1">
                            <label class="custom-control-label" for="size-1">XS</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-2">
                            <label class="custom-control-label" for="size-2">S</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-3">
                            <label class="custom-control-label" for="size-3">M</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-4">
                            <label class="custom-control-label" for="size-4">L</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="size-5">
                            <label class="custom-control-label" for="size-5">XL</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div> -->
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->
            <Products :category="category" :searchInput="searchInput" :maxPrice="maxPrice"/> 
        </div>
    </div>
    <!-- Shop End -->
    
</template>

<script>
    import BreadCrumb from '@/components/Category/BreadCrumb.vue';
    import Products from '@/components/Category/Products.vue';

    export default {
        name:'CategoriesView',
        components:{
            BreadCrumb,
            Products
        },
        
        data(){
            return{
                category:'',
                maxPrice : 1000,
            }
        },
        created(){
            this.category = this.$route.params.category;
        },

        
        

    }
</script>

<style scoped >
    .custom-control-input:checked ~ .custom-control-label::before {
  background-color: #446084; /* Change to your desired color */
  border-color: #446084; /* Change to your desired color */
}
</style>