<template lang="">
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0" v-if="products.length > 0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <tr v-for="product in products" :key="product.id">
                            <td class="align-middle"><img :src="require('@/assets/images/'+product.image_1)" alt="product image" style="width: 50px;margin-right:10px"></td>
                            <td class="align-middle">{{ product.name }}</td>
                            <td class="align-middle">${{ product.discount ? product.price - product.discount/100 * product.price : Math.trunc(product.price) }}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-custom btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-light border-0 text-center" :value="product.quantity">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-custom btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">${{ product.discount ? (product.price - product.discount/100 * product.price) * product.quantity : Math.trunc(product.price) * product.quantity }}</td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger" @click.prevent="deleteProduct(product.id)"><i class="fa fa-times"></i></button></td>
                        </tr>
                    </tbody>
                </table>
                
                <div v-else class="mt-5">
                    <i><svg style="width:50px; height:50px;display:inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg> 
                    </i>
                    <h1 style="display:inline" > Your cart is empty !</h1>
                </div>
            
            </div>
            <div class="col-lg-4" v-if="products.length > 0">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>${{ totalPrice }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">${{ totalPrice ? 5 : 0 }}</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>${{ totalPrice ? totalPrice + 5 : 0 }}</h5>
                        </div>
                        <button class="btn btn-block btn-custom font-weight-bold my-3 py-3" v-if="products.length > 0">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
</template>

<script>
import axios from 'axios';

export default {
    name: 'CartComponent',
    data() {
        return {
            products: [],
            message: '',
            totalPrice: 0,
        }
    },
    created() {
        this.getProducts();
    },
    methods: {
        async getProducts() {
            try {
                const userId = localStorage.getItem('auth_id');
                const token = localStorage.getItem('token');

                const response = await axios.get(`http://127.0.0.1:8000/api/cart/products/${userId}`, {
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                });
                this.totalPrice = response.data.total_price;
                this.products = response.data.products;
                
                if (this.products.length === 0) {
                    this.totalPrice = 0;
                }

                console.log(this.products);
            } catch (error) {
                console.log(error);
            }
        },
        async deleteProduct(id) {
            try {
                console.log(id);
                const token = localStorage.getItem('token');
                const response = await axios.delete(`http://127.0.0.1:8000/api/remove/${id}`, {
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                });
                this.message = response.data.message;
                console.log(this.message);

                if(this.products.length -1 < 1){
                    this.products =''
                }else{
                    this.getProducts();
                }
            } catch (error) {
                console.log(error);
            }
        },
    }
}
</script>

<style lang="">
</style>
