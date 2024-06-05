<template lang="">
    <Form
        :user_id="this.$route.query.user_id"
        :product_id="this.$route.query.product_id"
        :quantity="this.$route.query.quantity"
    />
</template>

<script>
import Form from '@/components/Order/Form';
export default {
    name:'OrderView',
    components:{
        Form,
    },
    
    
}
</script>
<style lang="">
    
</style>