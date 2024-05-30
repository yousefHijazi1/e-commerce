<template lang="">
    <div>
        <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-light pr-3">Contact Us</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form @submit.prevent="submitForm" id="contactForm" >
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="Your Name"
                                required="required" data-validation-required-message="Please enter your name" v-model="formData.name" value=/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Your Email"
                                required="required" data-validation-required-message="Please enter your email" v-model="formData.email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject"
                                required="required" data-validation-required-message="Please enter a subject" v-model="formData.subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="8" id="message" placeholder="Message"
                                required="required"
                                data-validation-required-message="Please enter your message" v-model="formData.message" ></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-custom py-2 px-4" type="submit" id="sendMessageButton">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30">
                    <iframe style="width: 100%;border:0; height: 250px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12881.244731713732!2d35.37641879815382!3d33.56287715343744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15185a130f272025%3A0x404015122fbf540!2sSaida%2C%20Lebanon!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0">
                    </iframe>
            </div>
                <div class="bg-light p-30 mb-3">
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-custom mr-3"></i>Saida, Lebanon</p>
                    <p class="mb-2"><i class="fa fa-envelope text-custom mr-3"></i>multishop@gmail.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-custom mr-3"></i>+961 81 086 955</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'FormComponent',
    data(){
        return{
            formData:{
                name:'',
                email:'',
                subject:'',
                message:''
            },
            resultMessage:''
        }
    },

    methods:{
        async submitForm(){
            console.log(this.formData);
            try {
                const response = await axios.post('http://127.0.0.1:8000/api/sendMessage', this.formData);
                    this.formData.name = '';
                    this.formData.email = '';
                    this.formData.subject = '';
                    this.formData.message = '';
                    
                    this.resultMessage = response.data.message;

                    if(response.data.code == 400){
                        this.errors = response.data.errors
                    }else{
                        this.resultMessage = response.data.message;
                        console.log(this.resultMessage);
                        setTimeout(() => {
                            this.message = '';
                        }, 4000)
                        this.errors = {};
                    }
                    }catch (error) { 
                        console.log(error)
                    } 
            },
        }
    }
    


</script>
<style lang="">
    
</style>