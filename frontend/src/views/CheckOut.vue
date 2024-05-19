<template lang="">
    <BreadCrumb/>
    <CheckoutComponent/>
</template>

<script>
import BreadCrumb from '@/components/Checkout/BreadCrumb.vue';
import CheckoutComponent from '@/components/Checkout/CheckoutComponent.vue';

export default {
    name:'CheckoutView',
    components:{
        BreadCrumb,
        CheckoutComponent
    }
}
</script>

<style lang="">
    
</style>