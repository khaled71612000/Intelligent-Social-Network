<template>
    <div class="register-container mx-2">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                <div class="card-group mb-0">

                    <div class="card p-4">
                        <div class="card-body">
                            <h1>Register</h1>
                            <p class="text-muted">Personal Information</p>
                            <form id="registerForm">
                                <div class="form-group row">
                                    <div class="col-sm-6 input-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input required type="text" class="form-control" v-model="firstname" id="inputFirstname"
                                            placeholder="First name">
                                    </div>
                                    <div class="col-sm-6 input-group">
                                        <span class="input-group-addon "><i class="fa fa-user"></i></span>
                                        <input required type="text" class="form-control" v-model="lastname" id="inputLastname"
                                            placeholder="Last name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 input-group">
                                        <span class="input-group-addon"><i class="fas fa-at"></i></span>
                                        <input required type="email" class="form-control" v-model="email" id="inputEmail"
                                            placeholder="Email">
                                    </div>
                                    <div class="col-sm-6 input-group">
                                        <span class="input-group-addon"><i class="fas fa-phone-square-alt"></i></span>
                                        <input required type="tel" class="form-control" v-model="phone" id="inputPhone"
                                            placeholder="Phone number (optional)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 input-group">
                                        <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                                        <input required type="password" class="form-control" v-model="password" id="inputPassword"
                                            placeholder="Password">
                                    </div>
                                    <div class="col-sm-6 input-group">
                                        <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control" v-model="confirmPassword" id="inputConfirmPassword"
                                            placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 input-group">
                                        <span class="input-group-addon"><i class="fas fa-globe-europe"></i></span>
                                        <select required class="form-control" id="inputCountry" v-model="country">
                                            <option value="-1" selected disabled> -- Country -- </option>
                                            <option v-for="country in countries" :value="country.code">{{ country.name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 input-group">
                                        <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                                        <input required type="date" class="form-control" v-model="dob" id="inputDoB"
                                            placeholder="Date of Birth">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-sm-6 input-group">
                                        <span class="input-group-addon"><i class="fas fa-venus-mars"></i></span>
                                        <select required class="form-control" id="inputGender" v-model="gender">
                                            <option value="-1" disabled> -- Gender -- </option>
                                            <option value="1" :selected="gender == '1'">Male</option>
                                            <option value="2" :selected="gender == '2'">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row justify-content-center text-center">
                                    <div class="col-6">
                                
                                        <router-link to="/register/2"><button @click.prevent="nextStep" class="btn btn-primary px-4">Next</button></router-link>
                                    </div>
                                </div>
                                <div class="row text-center">
                                <div class="col-12">
                                    <router-link to="/login"><button type="button" class="btn btn-link px-0">Already have an account?</button></router-link>
                                </div>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import countries from "../../../../assets/json/countries.json";
    import { mapState } from 'vuex';
    export default {
        data() {
            return {
                countries,
                step:1,
            }
        },
        computed: {
            firstname: {
                set(value) {
                    this.$store.commit("userForm/SET_FIRSTNAME", value);
                },
                get() {
                    return this.userForm.firstname
                }
            },
            lastname: {
                set(value) {
                    this.$store.commit("userForm/SET_LASTNAME", value);
                },
                get() {
                    return this.userForm.lastname
                }
            },
            email: {
                set(value) {
                    this.$store.commit("userForm/SET_EMAIL", value);
                },
                get() {
                    return this.userForm.email
                }
            },
            password: {
                set(value) {
                    this.$store.commit("userForm/SET_PASSWORD", value);
                },
                get() {
                    return this.userForm.password
                }
            },
            confirmPassword: {
                set(value) {
                    this.$store.commit("userForm/SET_CONFIRM_PASSWORD", value);
                },
                get() {
                    return this.userForm.confirmPassword
                }
            },
            phone: {
                set(value) {
                    this.$store.commit("userForm/SET_PHONE", value);
                },
                get() {
                    return this.userForm.phone
                }
            },
            country: {
                set(value) {
                    this.$store.commit("userForm/SET_COUNTRY", value);
                },
                get() {
                    return this.userForm.country
                }
            },
            dob: {
                set(value) {
                    this.$store.commit("userForm/SET_DOB", value);
                },
                get() {
                    return this.userForm.dob
                }
            },
            gender: {
                set(value) {
                    this.$store.commit("userForm/SET_GENDER", value);
                },
                get() {
                    return this.userForm.gender
                }
            },
            ...mapState(['userForm']),
            // ...mapActions(["setFirstname"])
        },
        mounted() {
           // console.log(countries);
        },
        methods: {
            nextStep() {
                // Check validation state of the form
                let myForm = document.getElementById("registerForm");
                let formIsValid = myForm.checkValidity();

                if (formIsValid || true) {
                    this.$router.push("/register/2");
                }
                else {
                    myForm.reportValidity();
                }
            }
        }
    }

</script>

<style scoped>
    .register-container {
        margin-top: 20px;
    }

</style>
