<template lang="">
    <BreadCrumb/>
    <CartComponent/>
</template>

<script>
import BreadCrumb from '@/components/Cart/BreadCrumb.vue';
import CartComponent from '@/components/Cart/CartComponent.vue';
export default {
    name:'CartView',
    components:{
        BreadCrumb,
        CartComponent
    }
}
</script>
<style lang="">
    
</style>