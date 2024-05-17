<template lang="">
  <div>
    <BreadCrumb/>
    <ContactForm/>
    <Footer/>
  </div>
</template>

<script>
import BreadCrumb from '@/components/Contact/BreadCrumb.vue';
import ContactForm from '@/components/Contact/ContactForm.vue';
import Footer from '@/components/Footer.vue';

export default {
  name:'ContactView',
  components:{
    BreadCrumb,
    ContactForm,
    Footer
  }
}
</script>
<style lang="">
  
</style>
