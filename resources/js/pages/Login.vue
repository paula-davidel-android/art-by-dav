<template>
    <div class="login-register" style="display: flex;">
    <div :class="'login-register-container ' + (changeToRegister ? 'sign-up-mode' : '')">
            <div class="forms-container">
                <div class="alert alert-danger" role="alert" v-if="error !== null">
                    {{ error }}
                </div>
                    <div :class="'login-form ' + (blinkAnimation > 0 ? 'blink-animation' : '')" v-if="!changeToRegister">
                            <div class="title">Sign In</div>
                            <div class="input-field">
                                    <i class="fas fa-user"></i>
                                    <input id="email" type="email" v-model="email" required placeholder="E-Mail Address" autofocus autocomplete="off">
                            </div><br>

                            <div class="input-field">
                                    <i class="fas fa-lock"></i>
                                    <input id="password" type="password" v-model="password" placeholder="Password" required autocomplete="off">
                            </div><br>

                            <button type="submit" class="btn-custom solid" @click="handleSubmit">
                                        Login
                            </button>
                            <p class="login-social-text">Or Sign in with social platforms</p>
                            <button @click="loginWithFacebook" class="btn btn-facebook btn-user btn-block">
                                 <i class="fab fa-facebook-f fa-fw"></i>
                                       Login with Facebook
                            </button>
                            <div class="login-social-media">
                            
                                <a href="#" class="login-social-icon">
                                    <i class="fab fa-google"></i>
                                </a>
                                <a href="#" class="login-social-icon">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                        </div>
                    </div>

                <div :class="'register-form '  + (blinkAnimation > 0 ? 'blink-animation' : '')" v-else>
                    <div class="title">Sign Up</div>
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                    <input id="name" type="text" v-model="name" required placeholder="Name" autofocus autocomplete="off">
                            </div><br>

                             <div class="input-field">
                                    <i class="fas fa-envelope"></i>
                                    <input id="email" type="email" v-model="email" required placeholder="E-Mail Address" autofocus autocomplete="off">
                            </div><br>

                            <div class="input-field">
                                    <i class="fas fa-lock"></i>
                                    <input id="password" type="password" v-model="password" placeholder="Password" required autocomplete="off">
                            </div><br>

                            <button type="submit" class="btn-custom solid" @click="handleSubmitRegister">
                                        Register
                            </button>

                             <p class="register-social-text">Or Sign Up with social platforms</p>
                            <div class="register-social-media">
                                <a href="#" class="register-social-icon">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="register-social-icon">
                                    <i class="fab fa-google"></i>
                                </a>
                                <a href="#" class="register-social-icon">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                </div>
            </div>
    </div>
     <div class="panels-container login-panel-container" v-if="!changeToRegister">
        <div class="panel login-panel">
            <div class="content">
                <h3>New Here?</h3>
                <p>If you want to know more about me and my work, please create an account </p>
                <button class="btn-custom transparent" id="sign-up-button" @click="changeToRegister = true;blinkAnimation++;">Sign Up</button>
            </div>
            <img :src="'/images/register.svg'" alt="" :class="'image ' + (blinkAnimation > 0 ? 'blink-animation' : '')">
        </div>
    </div>
     <div class="panels-container register-panel-container" v-else>
        <div class="panel register-panel">
            <div class="content">
                <h3>One of us?</h3>
                <p>If you have an account, please sign in to travel on the Paintings' World</p>
                <button class="btn-custom transparent" id="sign-in-button" @click="changeToRegister = false;blinkAnimation++;">Sign In</button>
            </div>
            <img :src="'/images/login.svg'" alt="" :class="'image ' + (blinkAnimation > 0 ? 'blink-animation' : '')">
        </div>
    </div>
    </div>

   </template>

<script>
export default {
    data() {
        return {
            email: "",
            password: "",
            changeToRegister: false,
            blinkAnimation: 0,
            error: null
        }
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault()
            if (this.password.length > 0) {
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/login', {
                        email: this.email,
                        password: this.password
                    })
                    .then(response => {
                        console.log(response.data)
                        if (response.data.success) {
                            localStorage.removeItem('logout');
                            window.Laravel.isLoggedin = true;
                            this.$router.go('/dashboard');
                        } else {
                            this.error = response.data.message
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
                })
            }
        },
        handleSubmitRegister(e) {
            e.preventDefault()
            if (this.password.length > 0) {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('api/register', {
                        name: this.name,
                        email: this.email,
                        password: this.password
                    })
                        .then(response => {
                            if (response.data.success) {
                                window.location.href = "/login"
                            } else {
                                this.error = response.data.message
                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                })
            }
        },

        loginWithFacebook() {
                axios.get('login').then(response => {
            
                })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (window.Laravel.isLoggedin) {
            return next('dashboard');
        }
        next();
    }
}
</script>
