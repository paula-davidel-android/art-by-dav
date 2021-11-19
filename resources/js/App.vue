<template>
    <div>
        <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light"> 
             <div class="navbar-nav">
                    <div class="section-logo">
                        <router-link to="/" class="header-logo"><img :src="'/images/logo.jpg'"  alt="Logo"></router-link><br>
                    </div>
                    <div class="form-inline float-right menu-items">
                        <div class="openMenu" @click="showMobileMenu"><i class="fas fa-bars"></i></div>
                        <!-- <div class="collapse navbar-collapse"> -->
                        <ul class="mainMenu" :style="show ? 'display:flex;top:0;' : 'top:-100%;'">
                            <li><router-link to="/" class="nav-item nav-link">Home</router-link></li>
                                <template v-if="isLoggedIn"> 
                                    <li><router-link to="/dashboard" class="nav-item nav-link">Dashboard</router-link></li>
                                    <li><router-link to="/paintings" class="nav-item nav-link">Paintings</router-link></li>
                                    <li><a class="nav-item nav-link" style="cursor: pointer;" @click="logout">Logout</a></li>
                                </template>
                                <template v-else>
                                    <li><router-link to="/login" class="nav-item nav-link">Login</router-link></li>
                                    <li><router-link to="/about" class="nav-item nav-link">About</router-link></li>
                                    <li><router-link to="/contact" class="nav-item nav-link">Contact</router-link></li>
                                </template>
                            <div class="closeMenu" @click="closeMobileMenu"><i class="fa fa-times"></i></div>
                            <span class="icons">
                                <i class="fab fa-facebook-f"></i>
                                <i class="fab fa-instagram"></i>
                                <i class="fab fa-whatsapp"></i>
                            </span>
                        </ul>
                    </div>
                </div>
            </nav>
    </div> 
    <template v-if="(!url.includes('login') && !url.includes('register')) ">
        <div class="container">
            <router-view/> 
        </div>
    </template>
    <template v-else> 
        <router-view/>
    </template>
</div>
</template>


<script>

export default {
    name: "App",
    data() {
        return {
            isLoggedIn: false,
            show: false,
            url: '',
            email: ''
        }
    },
    created() {
        if (localStorage.getItem("logout"))
        {
            this.isLoggedIn = false;
        }
        else
        {
            this.isLoggedIn = true;
        }
        window.Laravel.isLoggedin = this.isLoggedIn;
    },
    watch:{
        $route (to, from){
            this.url = this.$route.path;
        }
    },
    methods: {
        showMobileMenu()
        {
            this.show = true;
        },
        closeMobileMenu({target})
        {
            this.show = false;
        },
        logout(e) {
            console.log('ss')
            e.preventDefault()
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/logout')
                    .then(response => {
                        if (response.data.success === true) {
                            this.isLoggedIn = false
                            localStorage.setItem('logout',JSON.stringify(response.data.logout))
                            window.location.href = "/"
                        } else {
                            console.log(response)
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
}
</script>

<style lang="scss">

</style>