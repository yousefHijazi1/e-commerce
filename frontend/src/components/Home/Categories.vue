<template>
    <div v-if="displayCategories" class="swiper-container-wrapper mb-3 mt-4 p-3" id="swiper" >
        <swiper 
            :slides-per-view="3"
            :modules="modules"
            :space-between="40"
            :loop="true"
            @swiper="onSwiper"
            @slideChange="onSlideChange"
        >
            <swiper-slide><router-link to="/category/laptops" class="text-custom bg-light p-3 text-center fw-bold category " >Laptops</router-link></swiper-slide>
            <swiper-slide><router-link to="/category/desktops" class="text-custom bg-light p-3 text-center fw-bold category " >Desktops</router-link></swiper-slide>
            <swiper-slide><router-link to="/category/accessories" class="text-custom bg-light p-3 text-center fw-bold category " >Accessories</router-link></swiper-slide>
            <swiper-slide><router-link to="/category/drones" class="text-custom bg-light p-3 text-center fw-bold category " >Drones</router-link></swiper-slide>
            <swiper-slide><router-link to="/category/cameras" class="text-custom bg-light p-3 text-center fw-bold category " >Cameras</router-link></swiper-slide>    
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
    name: 'CategoriesComponent',
        components: {
            Swiper,
            SwiperSlide,
        },
        mounted() {
        // Check screen size when component is mounted
        if (window.innerWidth < 990) {
            this.displayCategories = true; // Set displayCategories to false if screen is less than 992px
        } else {
            this.displayCategories = false; // Set displayCategories to true if screen is 992px or larger
        }
    },
    
        data(){
            return{
                isDropdownOpen: false,
                selectedOption: 'Select an option',
                options: ['Option 1', 'Option 2', 'Option 3'],
                displayCategories:false,
            }
        },
        methods: {
            toggleDropdown() {
                this.isDropdownOpen = !this.isDropdownOpen;
            },
            selectOption(option) {
                this.selectedOption = option;
                this.isDropdownOpen = false;
            },
        },
        setup() {
        const onSwiper = (swiper) => {
            console.log(swiper);
        };
        const onSlideChange = () => {
            console.log('slide change');
        };
        return {
            onSwiper,
            onSlideChange,
            modules: [Autoplay, Pagination, Navigation],
        };
        },
    };
</script>

<style scoped>
.category{
    border-radius: 50px;
    /* position: static; */
    /* padding: 10px; */
}

.border-custom{
    border-color: #446084;
    border: solid 1px;
}

#swiper{
    background-color: rgb(244, 244, 244);
    
}

</style>
