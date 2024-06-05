<template>
    
    <BreadCrumb/>
        <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Filter by price</span></h5>
                <div class="bg-light p-4 mb-30">
                    <label for="customRange1" class="form-label">Price range: {{ maxPrice }}$</label>
                    <input type="range" class="form-range" id="customRange1" v-model="maxPrice" min="0" max="1000">
                </div>
                <!-- Price End -->

            </div>
            <!-- Shop Sidebar End -->
            <Products :maxPrice="maxPrice"/> <!-- Products Component -->
        </div>
    </div>
    <!-- Shop End -->
    
</template>

<script>
    import BreadCrumb from '@/components/Shop/BreadCrumb.vue';
    import Products from '@/components/Shop/Products.vue';

    export default {
        name:'ShopView',
        components:{
            BreadCrumb,
            Products
        },
        data(){
            return{
                maxPrice : 1000
            }
        },
    }
</script>

<style scoped >
    .custom-control-input:checked ~ .custom-control-label::before {
  background-color: #446084; /* Change to your desired color */
  border-color: #446084; /* Change to your desired color */
}
</style>