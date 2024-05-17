<template lang="">
    <div>
        <BreadCrumb/>
        <Item/>
        <suggestions/>
        <Footer/>
    </div>
    
</template>

<script>
import BreadCrumb from '@/components/Details/BreadCrumb.vue';
import Item from '@/components/Details/Item.vue';
import Suggestions from '@/components/Details/Suggestions.vue';
import Footer from '@/components/Footer.vue';
export default {
    name:'ItemDetails',
    components:{
        BreadCrumb,
        Item,
        Footer,
        Suggestions
    }
}
</script>

<style lang="">
    
</style>