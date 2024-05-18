<template lang="">
    <div>
        <BreadCrumb/>
        <Item :productId="productId"/>
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
        name: 'ItemDetails',
        components: {
            BreadCrumb,
            Item,
            Footer,
            Suggestions
        },
        data() {
            return {
                productId: null
            };
        },
        created() {
            this.productId = this.$route.params.id;
        }
}
</script>


<style lang="">
    
</style>