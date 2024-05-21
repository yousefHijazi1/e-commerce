<template lang="">
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <router-link to="/" class="breadcrumb-item text-dark" >Home</router-link>
                    <router-link to="/shop" class="breadcrumb-item text-dark" >Shop</router-link>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
</template>

<script>
export default {
    name: 'BreadCrumb'
}
</script>

<style>
    
</style>