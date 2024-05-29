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
                <div v-else>
                    <h2>Your cart is empty !</h2>
                </div>
            </div>
            <div class="col-lg-4">
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
                console.log(response.data.message);
                this.message = response.data.message;
                this.getProducts();
            } catch (error) {
                console.log(error);
            }
        },
    }
}
</script>

<style lang="">
</style>
