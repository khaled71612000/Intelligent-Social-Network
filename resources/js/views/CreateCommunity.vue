<template>
    <div class="container mt-5">
        <div class="row justify-content-center">

            <div class="col-md-10 col-md-offset-2">

                <h1>Create Community</h1>

                <div>

                    <div class="form-group has-error">
                        <label for="title">Title <span class="require">*</span> <small>(This field use in url
                                path.)</small></label>
                        <input type="text" class="form-control" name="title" v-model='title' />
                    </div>

                    <div class="form-group">
                        <label for="cover">Cover</label>

                        <div class="image-container mx-auto" v-if="imageFile">
                            <img id='img-upload' />
                        </div>

                        <div class="input-group justify-content-center">
                            <br>
                            <input accept="Image/*"  style="display:none;" type="file"
                                name="file" id="file">
                            <label for="file" class="btn btn-info choose-file">Upload cover</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description <span class="require">*</span></label>
                        <textarea rows="5" class="form-control" name="description" v-model='description'></textarea>
                    </div>

                    <div class="form-group">
                        <p><span class="require">*</span> - required fields</p>
                    </div>

                    <div class="form-group">
                        <button @click='submit' class="btn btn-primary">
                            Create
                        </button>
                        <button class="btn btn-default">
                            Cancel
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                imageFile: null,
                title:null,
                description:null,
            }
        },
        methods: {
            submit() {
                // API to create community
                // Use FormData to inject the file in the request
                let form_data = new FormData();
                let data = {
                    "title":this.title,
                    "file":this.imageFile,
                    "description":this.description
                };
                let that = this;

                
                Object.keys(data).forEach(key => {
                    form_data.append(key, data[key]);
                });
                console.log(form_data);
                axios.post("/api/community", form_data, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'Accept': 'application/json'
                    }
                }).then(response => {
                    let data = response.data;
                    if(data["state"] == 1) {
                        this.comm
                        this.$router.push({
                            name: 'community',
                            params: {id:data['id']}
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
        },
        mounted() {
            let that = this;
            $(document).ready(function () 
                {
                $("#file").on('change', function () {
                    var input = $(this),
                        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                    input.trigger('fileselect', [label]);
                    that.imageFile = this.files[0]
                    showImage(this);
                });

                function showImage(input) 
                {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            let imageBase64 = e.target.result
                            $('#img-upload').attr('src', imageBase64);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            })
        }
    }

</script>

<style scoped>
    .image-container {
        border: 1px dashed gray;
        max-width: 300px;
        margin: 10px 0px 10px 0px;
    }

    #img-upload {
        max-width: 300px;
    }

</style>
