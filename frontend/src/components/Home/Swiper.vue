<template>
    <div class="swiper-container-wrapper" id="swiper" >
        <swiper 
            :slides-per-view="4"
            :modules="modules"
            :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
            }"
            :space-between="50"
            :loop="true"
            @swiper="onSwiper"
            @slideChange="onSlideChange"
        >
            <swiper-slide><img :src="require('@/assets/images/dell.png')" alt="dell logo" class="col-lg-3 col-md-6 col-sm-12" style="min-width: 100px; max-width: 200px"></swiper-slide>
            <swiper-slide><img :src="require('@/assets/images/asus.png')" class="col-lg-3 col-md-6 col-sm-12" alt="asus logo" style="min-width: 100px; max-width: 200px"></swiper-slide>
            <swiper-slide><img :src="require('@/assets/images/msi.png')" class="col-lg-3 col-md-6 col-sm-12" alt="msi logo" style="min-width: 100px; max-width: 200px"></swiper-slide>
            <swiper-slide><img :src="require('@/assets/images/lenovo.png')" class="col-lg-3 col-md-6 col-sm-12" alt="lenovo logo" style="min-width: 100px; max-width: 200px"></swiper-slide>
            <swiper-slide><img :src="require('@/assets/images/hp.png')" class="col-lg-3 col-md-6 col-sm-12" alt="hp logo" style="min-width: 100px; max-width: 200px"></swiper-slide>
            <swiper-slide><img :src="require('@/assets/images/acer.png')" class="col-lg-3 col-md-6 col-sm-12" alt="acer logo" style="min-width: 100px; max-width: 200px"></swiper-slide>
            <swiper-slide><img :src="require('@/assets/images/toshiba.png')" class="col-lg-3 col-md-6 col-sm-12" alt="acer logo" style="min-width: 150px; max-width: 300px"></swiper-slide>
        </swiper>

    </div>
</template>

<script>
    
    import { Swiper, SwiperSlide } from 'swiper/vue';
    import 'swiper/css';

    // Import Swiper core styles
    import 'swiper/css/bundle';

    // Import Swiper styles
    import 'swiper/css';
    import { Autoplay, Pagination, Navigation } from 'swiper/modules';

    export default {
    name: 'SwiperComponent',
        components: {
            Swiper,
            SwiperSlide,
        },
        
        setup() {
        const onSwiper = (swiper) => {
            console.log(swiper);
        };
        const onSlideChange = () => {
            console.log('slide change');
        };
        
        const autoplay = Autoplay; // Import the Autoplay module
        return {
            onSwiper,
            onSlideChange,
            autoplay,
            modules: [Autoplay, Pagination, Navigation],
        };
        },
    };
</script>

<style scoped>
    #swiper{
        background-color: rgb(244, 244, 244);
    }
</style>
