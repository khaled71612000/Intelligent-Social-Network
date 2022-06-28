<template>
    <div class="login-container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-10 col-sm-6 col-lg-4">
                <div class="card-group mb-0">
                    <div class="card p-4">
                        <div class="card-body">
                            <div class="alert alert-danger text-center" v-if="error">
                                {{error}}
                            </div>
                            <h1 class="text-center">Login</h1>
                            <p class="text-muted text-center">Sign In to your account</p>
                            <div class="input-group mb-3">
                                <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control " placeholder="Email" v-model="email"
                                    name="email">
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Password" name="password"
                                    v-model="password">
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 offset-md-8" style="margin-left:0px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" v-model="remember"
                                            name="remember" id="remember">

                                        <label class="form-check-label" for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-primary px-4"
                                        @click.prevent="isLoading ? null : login()" :disabled="isLoading">
                                        <div class="spinner-border text-light" role="status" v-if="isLoading">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        <span v-else>Login</span>
                                    </button>

                                </div>

                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-link px-0">Forgot password?</button>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-12">
                                    <router-link to="/register/1"><button type="button" class="btn btn-link px-0">Create
                                            Account?</button></router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {
        mapState
    } from 'vuex';
    export default {
        data() {
            return {
                email: "",
                password: "",
                remember: false,
                api: this.$store.state.api,
                error: null,
                loading: false
            }
        },
        mounted() {
            console.log(this.api)
        },
        computed: {
            errorMessage() {
                return this.error;
            },
            isLoading() {
                return this.loading;
            }
        },
        methods: {
            async login() {
                let data = {
                    email: this.email,
                    password: this.password,
                    remember: this.remember
                };
                this.loading = true;
                let response = await this.$store.dispatch("user/login", [data]);
                this.loading = false;
                console.log(response);
                if (response.authenticated) {
                    // Route to dashboard
                    this.$store.dispatch('userForm/resetState', null, {
                        root: true
                    });
        
                    this.$router.push({
                        name: 'home'
                    });

                } else {
                    this.error = response.message
                }

            },
            displayReg() {
                document.getElementById("registerRouteBtn").click();
            }
        }
    }

</script>

<style scoped>
    @import "../../../css/login.css";

    .login-container {
        margin-top: 20px;
    }
    .row {
        height: auto !important;
    }
    .loader {
        width: 1em;
        height: 1em;
        border-radius: 50%;
        background: #ffffff;
        background: -moz-linear-gradient(left, #ffffff 10%, rgba(255, 255, 255, 0) 42%);
        background: -webkit-linear-gradient(left, #ffffff 10%, rgba(255, 255, 255, 0) 42%);
        background: -o-linear-gradient(left, #ffffff 10%, rgba(255, 255, 255, 0) 42%);
        background: -ms-linear-gradient(left, #ffffff 10%, rgba(255, 255, 255, 0) 42%);
        background: linear-gradient(to right, #ffffff 10%, rgba(255, 255, 255, 0) 42%);
        position: relative;
        -webkit-animation: load3 1.4s infinite linear;
        animation: load3 1.4s infinite linear;
        -webkit-transform: translateZ(0);
        -ms-transform: translateZ(0);
        transform: translateZ(0);
    }

    .loader:before {

        background: #ffffff;
        border-radius: 100% 0 0 0;
        position: absolute;
        top: 0;
        left: 0;
        content: '';
    }

    .loader:after {

        content: '';
        margin: auto;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
    }

    @-webkit-keyframes load3 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes load3 {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

</style>
