<template>
    <Categories/>
    
    <Carousel/>

    <Feature/>

    <RecentProducts/>
    
    
    <!-- <Offer/> -->
    
    <Products/>
    

    <Vendor/>

    <Swiper/>
    <Footer/>
</template>

<script>
// @ is an alias to /src
import Footer from '@/components/Footer.vue';
import Carousel from '@/components/Home/Carousel.vue';
import Feature from '@/components/Home/Feature.vue';
import Products from '@/components/Home/Products.vue';
// import Offer from '@/components/Home/Offer.vue';
import RecentProducts from '@/components/Home/RecentProducts.vue';
import Vendor from '@/components/Home/Vendor.vue';
import Swiper from '@/components/Home/Swiper.vue';

import carousel from 'vue-owl-carousel'
import Categories from '@/components/Home/Categories.vue';


// import Swiper from '@components/Home/Swiper.vue';
export default {
  name: 'HomeView',
  
  components: {
    Footer,
    Carousel,
    Feature,
    Products,
    // Offer,
    RecentProducts,
    Vendor,
    carousel,
    Swiper,
    Categories,
  }
}
</script>
