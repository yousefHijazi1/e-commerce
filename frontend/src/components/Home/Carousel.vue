<template lang="">
    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" :src="require('@/assets/images/laptops.webp')"  style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Laptops</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">{{ truncatedDescriptions.laptops }}</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" :src="require('@/assets/images/playstation.png')" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Playstations</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">{{ truncatedDescriptions.playstations }}</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" :src="require('@/assets/images/accessories.png')" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Accessories</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">{{ truncatedDescriptions.accessories }}</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/offer-1.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-custom">Shop Now</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/offer-2.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-custom">Shop Now</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- Carousel End -->
</template>

<script>
export default {
    name: 'CarouselComponent',
    data() {
        return {
            descriptions: {
                laptops: 'Upgrade to the latest in technology with our top of the line laptops. Designed for performance and built to last, our laptops are perfect for work, play, and everything in between.',
                playstations: 'Step into the world of endless entertainment with the latest PlayStation console. Whether you are a hardcore gamer or just looking for some fun, PlayStation offers something for everyone.',
                accessories: 'Upgrade your setup with our wide range of high quality computer and laptop accessories. From productivity boosters to essential gadgets, we have everything you need to optimize your tech experience.'
            },
            windowWidth: window.innerWidth
        };
    },
    computed: {
        truncatedDescriptions() {
            if (this.windowWidth < 570) {
                return {
                    laptops: this.truncateText(this.descriptions.laptops, 60),
                    playstations: this.truncateText(this.descriptions.playstations, 60),
                    accessories: this.truncateText(this.descriptions.accessories, 60)
                };
            }
            return this.descriptions;
        }
    },
    methods: {
        truncateText(text, length) {
            return text.length > length ? text.substring(0, length) + ' ...' : text;
        },
        updateWindowWidth() {
            this.windowWidth = window.innerWidth;
        }
    },
    mounted() {
        window.addEventListener('resize', this.updateWindowWidth);
    },
    beforeunmount() {
        window.removeEventListener('resize', this.updateWindowWidth);
    }
};
</script>

<style>
    
</style>