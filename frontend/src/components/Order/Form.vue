<template>
    <!-- Checkout Start -->
    <div class="container-fluid mt-4">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div v-if="message" :class="alertClass" role="alert">
                        <p>{{ message }}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John" v-model="formData.firstName" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Doe" v-model="formData.lastName" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com" v-model="formData.email" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="70 123 456" v-model="formData.phone" required>
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <select class="custom-select" v-model="formData.city" required>
                                <option value="akkar">Akkar</option>
                                <option value="tripole">Tripole</option>
                                <option value="beqaa">Beqaa</option>
                                <option value="baalbak">Baalbak</option>
                                <option value="beirut">Beirut</option>
                                <option value="saida">Saida</option>
                                <option value="tyre">Tyre</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" placeholder="Street / Building name ..." v-model="formData.address" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Product</h6>
                        <div class="d-flex justify-content-between">
                            <p>{{ product.name }}</p>
                            <p>${{ Math.trunc(product.price) }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Quanyity</p>
                            <p>{{ this.quantity }} pcs</p>
                        </div>
                        
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>${{ Math.trunc(product.price) * this.quantity }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>${{ Math.trunc(product.price) * this.quantity + 10 }}</h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="cash" checked>
                                <label class="custom-control-label" for="cash">Cash on delivery</label>
                            </div>
                        </div>
                        <button class="btn btn-block btn-custom font-weight-bold py-3" @click="placeOrder">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
</template>

<script>
import axios from 'axios';

export default {
    name: 'OrderComponent',
    data() {
        return {
            product: {},

            formData: {
                firstName: '',
                lastName: '',
                email: '',
                phone: '',
                city: '',
                address: '',
            },

            message:'',
            code:0
        };
    },
    props: {
        user_id: {
            type: Number,
            required: true
        },
        product_id: {
            type: Number,
            required: true
        },
        quantity: {
            type: Number,
            required: true
        }
    },
    computed: {
        alertClass() {
            return {
                'alert': true,
                'alert-primary': this.code === 200,
                'alert-danger': this.code !== 200
            };
        }
    },
    created() {
        this.getProduct();
    },
    methods: {
        async getProduct() {
            try {
                const response = await axios.get(`http://127.0.0.1:8000/api/productDetails/${this.product_id}`);
                this.product = response.data.product;
                console.log(this.product);
            } catch (error) {
                console.log(error);
            }
        },

        async placeOrder() {
            try {
                const token = localStorage.getItem('token');
                const formData = this.formData;

                // Create the payload for the POST request
                const payload = {
                    user_id: this.user_id,
                    product_id: this.product_id,
                    quantity: this.quantity,
                    name: `${formData.firstName} ${formData.lastName}`,
                    cost: this.quantity * this.product.price + 10,
                    ...formData, // Spread in other form data
                    product: this.product
                };

                // Make the POST request to the API endpoint
                const response = await axios.post('http://127.0.0.1:8000/api/createOrder/', 
                    payload,
                    {
                        headers: {
                            'Authorization': `Bearer ${token}`,
                            'Content-Type': 'application/json'
                        }
                    }
                );

                this.formData.firstName = '',
                this.formData.lastName = '',
                this.formData.email = '',
                this.formData.phone = '',
                this.formData.city = '',
                this.formData.address = '',

                this.message = response.data.message;
                this.code = response.data.code;

                // Handle the response as needed
                response.data.code == 200 ? console.log(response.data.message) : console.log(response.data.errors)
                
            } catch (error) {
                // Handle errors as needed
                console.error('Error placing order:', error);
                
            }
        }
    }
};
</script>

<style>
/* Add your styles here */
</style>
