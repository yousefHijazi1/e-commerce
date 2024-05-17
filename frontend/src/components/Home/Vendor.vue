<template lang="">
    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img :src="require('@/assets/images/acer.png')" alt="acer logo">
                    </div>
                    <div class="bg-light p-4">
                        <img :src="require('@/assets/images/hp.png')" alt="hp logo">
                    </div>
                    <div class="bg-light p-4">
                        <img :src="require('@/assets/images/lenovo.png')" alt="lenovo logo">
                    </div>
                    <div class="bg-light p-4">
                        <img :src="require('@/assets/images/asus.png')" alt="asus logo">
                    </div>
                    <div class="bg-light p-4">
                        <img :src="require('@/assets/images/dell.png')" alt="dell logo">
                    </div>
                    <div class="bg-light p-4">
                        <img :src="require('@/assets/images/msi.png')" alt="msi logo">
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
</template>

<script>

export default {
    name:'VenderCarousel',
    data(){
        return{
            
        }
    }
}
</script>
<style lang="">
    
</style>