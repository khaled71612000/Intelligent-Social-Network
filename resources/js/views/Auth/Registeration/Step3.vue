<template>
    <div class="register-container">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                <div class="card-group mb-0">
                    <div class="card p-4">
                        <div class="card-body">
                            <h1>Register</h1>
                            <p class="text-muted">Preferences</p>
                            <form id="registerForm" enctype="multipart/form-data">
                                <div class="form-group row justify-content-center ">
                                    <div class="image-container" v-if="file">
                                        <img :src="fileBase64" id='img-upload' />
                                    </div>

                                    <div class="input-group justify-content-center">
                                        <br>
                                        <input required accept="Image/*" maxsize="7999" style="display:none;"
                                            type="file" name="file" id="file">
                                        <label for="file" class="btn btn-info choose-file">Upload profile
                                            picture</label>
                                    </div>

                                    <h5>Select your hobbies</h5>
                                    <div class="blocks">
                                        <span @click="toggleHobby" v-for="hobby in currentDefaultHobbies"
                                            :class=" hobbies.includes(hobby) ? badgeClass+' selected' :badgeClass">{{hobby + (hobbies.includes(hobby) ? " x" : "")}}</span>
                                    </div>
                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="far fa-futbol"></i></span>
                                        <textarea required readonly class="form-control" id="listOfHobbies"
                                            :value=hobbiesAsString></textarea>
                                    </div>
                                    <h5 style="text-align:left;">Other:</h5>
                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fas fa-swimmer"></i></span>
                                        <input type="text" class="form-control" id="hobbyInput"
                                            placeholder="Hobby1,Hobby2, ..." v-model="otherHobbies">
                                        <button class="btn btn-primary px-4" id="addHobbyBtn">Add</button>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-6">
                                        <router-link to="/register/2"><button class="btn btn-primary px-4">Back</button>
                                        </router-link>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" @click.prevent="submitForm"
                                            class="btn btn-primary px-4">Submit</button>
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
    import {
        mapState
    } from 'vuex';
    export default {
        data() {
            return {
                profilePic: {
                    path: "",
                    name: "",
                    file: ""
                },
                hobbiesCopy: [],
                defaultHobbies: [
                    "reading", "writing", "music", "sports", "shopping", "hiking",
                    "sweing", "swimming", "running", "skating", "traveling", "yoga",
                    "graphic design", "art", "video Games", "volunteering", "programming",
                    "photography", "dancing", "handcrafts"
                ],
                otherHobbies: "",
                badgeClass: "badge badge-info",
                api:this.$store.state.api

            }
        },
        computed: {
            file: {
                set(value) {
                    this.$store.commit("userForm/SET_PROFILE_PIC", value);
                },
                get() {
                    return this.$store.state.userForm.profilePic;
                },
            },
            fileBase64: {
                set(value) {
                    this.$store.commit("userForm/SET_FILE_BASE64", value);
                },
                get() {
                    return this.$store.state.userForm.fileBase64;
                }
            },
            hobbies: {
                set(value) {
                    this.$store.commit("userForm/SET_HOBBIES", value);
                },
                get() {
                    return this.$store.state.userForm.hobbies;
                }
            },
            hobbiesAsString() {
                return this.$store.state.userForm.hobbies.join(", ")
            },
            additionalHobbies() {
                return this.otherHobbies;
            },
            currentDefaultHobbies() {
                return this.defaultHobbies;
            },
            ...mapState(["userForm"])


        },
        methods: {
            submitForm() {
                // API sign up
                // Use FormData to inject the file in the request
                let form_data = new FormData();
                let that = this;
                // if(Object.keys(that.file).length == 0) {
                //     console.log("File is empty");
                //     this.file = this.dataURLtoFile(this.fileBase64, "userprofile");
                // }
                
                Object.keys(this.userForm).forEach(key => {
                if (key == "hobbies" || key == "test_answers")
                    form_data.append(key, JSON.stringify(this.userForm[key]))
                else if (key != "fileBase64") {
                    form_data.append(key, this.userForm[key]);
                }

                });
                console.log(form_data);
                axios.post("/register", form_data, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'Accept': 'application/json'
                    }
                }).then(response => {
                    let data = response.data;
                    if(data["state"] == 1) {
                        this.comm
                        this.$router.push({
                            name: 'login'
                        });
                    }
                    else {
                        alert("Something Went Wrong!");
                    }
                }).catch(error => {
                    console.log(error);
                    alert("Something went wrong");
                })
            },
            dataURLtoFile(dataurl, filename) {
                var arr = dataurl.split(','),
                    mime = arr[0].match(/:(.*?);/)[1],
                    bstr = atob(arr[1]), 
                    n = bstr.length, 
                    u8arr = new Uint8Array(n);
                    let extension = "."+mime.substring(mime.indexOf("/")+1);
                while(n--){
                    u8arr[n] = bstr.charCodeAt(n);
                }
                
                return new File([u8arr], filename+extension, {type:mime});
            },
            toggleHobby(e) {
                let badge = e.target;
                let hobby = badge.textContent.replace(" x", "");
                if (this.hobbies.includes(hobby)) {
                    this.hobbiesCopy.splice(this.hobbiesCopy.indexOf(hobby), 1);
                } else {
                    this.hobbiesCopy.push(hobby);
                    //that.hobbies.push(hobbyTitle);
                    //block.html(hobbyTitle + " x");
                }
                this.hobbies = this.hobbiesCopy.slice();
                //console.log(this.hobbiesCopy);
            }
        },
        mounted() {
            let that = this;
            $(document).ready(function () {
                $("#file").on('change', function () {
                    var input = $(this),
                        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                    input.trigger('fileselect', [label]);
                    // that.profilePic.name = label;
                    // that.profilePic.path = input.val();
                    // that.profilePic.file = this.files[0];
                    that.profilePic = this.files[0];
                    that.file = this.files[0]
                    showImage(this);
                });

                function showImage(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            let imageBase64 = e.target.result
                            $('#img-upload').attr('src', imageBase64);
                            that.file = that.dataURLtoFile(imageBase64, "userprofile");
                            that.profilePic = that.file;
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                // $(".badge").on("click", function () {
                //     let block = $(this);
                //     let hobbyTitle = block.html().replace(" x", "");
                //     if (that.hobbies.includes(hobbyTitle)) {
                //         block.html(hobbyTitle)
                //         that.hobbiesCopy.splice(that.hobbiesCopy.indexOf(hobbyTitle), 1);
                //         that.hobbies = that.hobbiesCopy.slice()
                //     } else {
                //         that.hobbiesCopy.push(hobbyTitle);
                //         that.hobbies = that.hobbiesCopy.slice();
                //         //that.hobbies.push(hobbyTitle);
                //         //block.html(hobbyTitle + " x");
                //     }
                //     //block.toggleClass("selected");
                // })

                $("#addHobbyBtn").on("click", function () {
                    let newHobbies = that.additionalHobbies.replace(/[,\s+][,\s+]+/g, ",").toLowerCase()
                        .split(",")
                    newHobbies = newHobbies.filter(hobby => {
                        if (!that.currentDefaultHobbies.includes(hobby)) {
                            that.currentDefaultHobbies.push(hobby);
                            return true;
                        }
                        return false
                    });
                    newHobbies = newHobbies.concat(that.hobbies)
                    that.hobbies = newHobbies.slice();
                    that.hobbiesCopy = that.hobbies.slice();
                    that.otherHobbies = "";
                })
            });
        }
    }

</script>

<style scoped>
    .register-container {
        margin-top: 20px;
    }

    .image-container {
        border: 3px dashed gray;
        width: 150px;
        margin: 10px 0px 10px 0px;
    }

    #img-upload {
        width: 150px;
    }

    .blocks {
        width: 85%;
    }

    .badge {
        font-size: 14px;
        cursor: pointer;
        word-break: keep-all;
        margin: 0px 3px 0px 3px;
    }

    #listOfHobbies,
    .badge {
        text-transform: capitalize;
    }

    .selected {
        background-color: #d5ffc9;
    }

    h5 {
        margin-top: 20px;
    }

</style>
