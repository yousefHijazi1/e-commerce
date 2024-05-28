<template lang="">
    <div class="container">
      <input type="checkbox" id="flip">
        <div class="cover">
          <div class="front">
            <img :src="require('@/assets/images/login.jpg')" alt="">
            <div class="text">
              <span class="text-1">Every new friend is a <br> new adventure</span>
              <span class="text-2">Let's get connected</span>
            </div>
          </div>
          <div class="back">
            <!--<img class="backImg" src="images/backImg.jpg" alt="">-->
            <div class="text">
              <span class="text-1">Complete miles of journey <br> with one step</span>
              <span class="text-2">Let's get started</span>
            </div>
          </div>
        </div>
        <div v-if="cartMessage" class="alert alert-warning col-lg-6 col-md-6 col-sm-12" role="alert">
            {{ cartMessage }}
        </div>
        <div class="forms">
            <div class="form-content">
              <div class="login-form">
                <div class="title">Login</div>
              <form  @submit.prevent="login">
                <div class="input-boxes">
                  <div class="input-box">
                    <i style="width:15px" class="text-custom" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></i>
                    <input type="email" placeholder="Enter your email" required v-model="loginData.email">
                  </div>
                  <strong><span v-if="errors.email" class="text-danger">{{ errors.email[0] }}</span></strong>
                  <strong><span v-if="message" class="text-danger">{{ message }}</span></strong> 
                  
                  <div class="input-box">
                    
                    <i style="width:15px" class="text-custom" ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"/></svg></i>
                    <input type="password" placeholder="Enter your password" required v-model="loginData.password">
                  </div>
                  <strong><span v-if="errors.password" class="text-danger">{{ errors.password[0] }}</span></strong>
                  
                  <div class="text mt-3"><a href="#">Forgot password?</a></div>
                  
                  <div class="button input-box">
                    <button class="btn-custom " type="submit" @click="login">Submit</button>
                  </div>
                  
                  <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
                </div>
            </form>
          </div>
        
          <div class="signup-form">
            <div v-if="registered" class="alert alert-primary" role="alert">
              {{ registered }}
            </div>
            <div class="title">Signup</div>
              <form @submit.prevent="register">
                  <div class="input-boxes">
                    <div class="input-box">
                      <i style="width:15px;" class="text-custom"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></i>
                      <input type="text" placeholder="Enter your name" required v-model="registerData.name">
                      <p v-if="errors && errors.name" class="text-danger fw-bold mt-2">{{ errors.name.join(', ') }}</p>
                    </div>
                    <div class="input-box">
                      <i style="width:15px" class="text-custom"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg></i>
                      <input type="email" placeholder="Enter your email" required v-model="registerData.email">
                      <p v-if="errors && errors.name" class="text-danger fw-bold mt-2">{{ errors.email.join(', ') }}</p>
                    </div>
                    <div class="input-box">
                      <i style="width:15px" class="text-custom"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg></i>
                      <input type="text" placeholder="Enter your phone number" required v-model="registerData.phone">
                      <p v-if="errors && errors.name" class="text-danger fw-bold mt-2">{{ errors.phone.join(', ') }}</p>
                    </div>
                    <div class="input-box">
                      <i style="width:15px" class="text-custom"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"/></svg></i>
                      <input type="password" placeholder="Enter your password" required v-model="registerData.password">
                      <p v-if="errors && errors.name" class="text-danger fw-bold mt-2">{{ errors.password.join(', ') }}</p>
                    </div>
                    <div class="input-box">
                      <i style="width:15px" class="text-custom"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"/></svg></i>
                      <input type="password" placeholder="Repeat your password" required v-model="registerData.password_confirmation">
                      <p v-if="errors && errors.name" class="text-danger fw-bold mt-2">{{ errors.password_confirmation.join(', ') }}</p>
                    </div>
                    <div class="button input-box">
                      <input type="submit" value="Sumbit">
                    </div>
                    <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
                  </div>
              </form>
          </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'AuthView',
    data(){
      return{
        loginData:{
          email:'',
          password:'',
        },
        registerData:{
          name: '',
          email: '',
          password: '',
          password_confirmation: ''

        },
        errors: {},
        message:'',
        cartMessage: '',
        registered:''
        
      }
    },
    created(){
      this.cartMessage = this.$route.query.message || '';
    },
    methods:{
      async login(){
        try {
              const response = await axios.post('http://127.0.0.1:8000/api/login', this.loginData);
              if (response.data.token) {
                localStorage.setItem('token', response.data.token);
                localStorage.setItem('role', response.data.user.role);
                localStorage.setItem('auth_id',response.data.user.id);
                const userID = localStorage.getItem('auth_id');

                if (response.data.user.role === 'admin') {
                    this.$router.push('/admin');

                }else {
                  this.$router.push(`/cart/${userID}`);
                }
              }

              this.message = response.data.message;
              console.log(this.message);
            } catch (error) {
              this.errors = error.response.data.errors;
              console.log(this.errors);
            }
      },
      async register(){
            try {
                const response = await axios.post('http://127.0.0.1:8000/api/register', this.registerData);
                    this.registerData.name = '';
                    this.registerData.email = '';
                    this.registerData.phone = '';
                    this.registerData.password = '';
                    this.registerData.password_confirmation = '';
                    this.registered = response.data.message;
                    if(response.data.code == 400){
                        this.errors = response.data.errors
                    }else{
                        this.message = response.data.message;
                        setTimeout(() => {
                            this.message = '';
                        }, 4000)
                        this.errors = {};
                    }
                    }catch (error) { 
                        console.log(error)
                    }  
          }, 
    },
}
</script>




<style scoped>
    /* Google Font Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
body{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  /* background: #446084; */
  padding: 30px;
}
.container{
  position: relative;
  max-width: 850px;
  width: 100%;
  background: #fff;
  padding: 40px 30px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
  perspective: 2700px;
}
.container .cover{
  position: absolute;
  top: 0;
  left: 50%;
  height: 100%;
  width: 50%;
  z-index: 98;
  transition: all 1s ease;
  transform-origin: left;
  transform-style: preserve-3d;
}
.container #flip:checked ~ .cover{
  transform: rotateY(-180deg);
}
 .container .cover .front,
 .container .cover .back{
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
}
.cover .back{
  transform: rotateY(180deg);
  backface-visibility: hidden;
}
.container .cover::before,
.container .cover::after{
  content: '';
  position: absolute;
  height: 100%;
  width: 100%;
  background: #446084;
  opacity: 0.5;
  z-index: 12;
}
.container .cover::after{
  opacity: 0.3;
  transform: rotateY(180deg);
  backface-visibility: hidden;
}
.container .cover img{
  position: absolute;
  height: 100%;
  width: 100%;
  object-fit: cover;
  z-index: 10;
}
.container .cover .text{
  position: absolute;
  z-index: 130;
  height: 100%;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.cover .text .text-1,
.cover .text .text-2{
  font-size: 26px;
  font-weight: 600;
  color: #fff;
  text-align: center;
}
.cover .text .text-2{
  font-size: 15px;
  font-weight: 500;
}
.container .forms{
  height: 100%;
  width: 100%;
  background: #fff;
}
.container .form-content{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.form-content .login-form,
.form-content .signup-form{
  width: calc(100% / 2 - 25px);
}
.forms .form-content .title{
  position: relative;
  font-size: 24px;
  font-weight: 500;
  color: #333;
}
.forms .form-content .title:before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 25px;
  background: #446084;
}
.forms .signup-form  .title:before{
  width: 20px;
}
.forms .form-content .input-boxes{
  margin-top: 30px;
}
.forms .form-content .input-box{
  display: flex;
  align-items: center;
  height: 50px;
  width: 100%;
  margin: 10px 0;
  position: relative;
}
.form-content .input-box input{
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  padding: 0 30px;
  font-size: 16px;
  font-weight: 500;
  border-bottom: 2px solid rgba(0,0,0,0.2);
  transition: all 0.3s ease;
}
.form-content .input-box input:focus,
.form-content .input-box input:valid{
  border-color: #446084;
}
.form-content .input-box i{
  position: absolute;
  color: #446084;
  font-size: 17px;
}
.forms .form-content .text{
  font-size: 14px;
  font-weight: 500;
  color: #333;
}
.forms .form-content .text a{
  text-decoration: none;
}
.forms .form-content .text a:hover{
  text-decoration: underline;
}
.forms .form-content .button{
  color: #fff;
  margin-top: 40px;
}
.forms .form-content .button input{
  color: #fff;
  background: #446084;
  border-radius: 6px;
  padding: 0;
  cursor: pointer;
  transition: all 0.4s ease;
}
.forms .form-content .button input:hover{
  background: #2f4c72;
}
.forms .form-content label{
  color: #446084;
  cursor: pointer;
}
.forms .form-content label:hover{
  text-decoration: underline;
}
.forms .form-content .login-text,
.forms .form-content .sign-up-text{
  text-align: center;
  margin-top: 25px;
}
.container #flip{
  display: none;
}
@media (max-width: 730px) {
  .container .cover{
    display: none;
  }
  .form-content .login-form,
  .form-content .signup-form{
    width: 100%;
  }
  .form-content .signup-form{
    display: none;
  }
  .container #flip:checked ~ .forms .signup-form{
    display: block;
  }
  .container #flip:checked ~ .forms .login-form{
    display: none;
  }
}
</style>