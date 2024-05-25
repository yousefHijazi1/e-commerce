<template lang="">
    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-custom m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0 title" id="title">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="text-custom m-0 mr-3 fa">$</h1>
                    <h5 class="font-weight-semi-bold m-0 title">Cash on Delivery</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-custom m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0 title">Low Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-custom m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0 title">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->
</template>

<script>
export default {
    name: 'FeatureComponent'
}
</script>

<style scoped>
    @media (max-width: 768px) {
    .title {
        font-size: 1.5rem; /* Font size for small screens */
    }
}

@media (max-width: 576px) {
    .title  {
        font-size: 1rem; /* Font size for extra small screens */
    }
    .fa {
        font-size: 2rem; /* Font size for extra small screens */
    }
    
}
</style>