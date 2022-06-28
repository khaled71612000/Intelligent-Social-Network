<template>
    <div class="col-12 col-sm-10 col-md-7 col-lg-6 order-1 order-md-0 posts-container">
        <div class="input-group mb-2">
            <input type="search" class="form-control rounded" placeholder="Search for posts, users, comments.."
                aria-label="Search" aria-describedby="search-addon" />
            <button type="button" class="btn btn-outline-primary"><i class="fas fa-search"></i></button>
        </div>
        <div v-if='showPostForm' class="post-form">
            <input type="text" class="form-control" placeholder="Post header" name="header" id="post-header" required
                v-model='new_post.header'>
            <textarea rows="5" placeholder="Post body (optional)" class="form-control my-1"
                v-model='new_post.body'></textarea>
            <img v-if='new_post.image' src="" id="img-upload" class="my-1">
            <button @click='uploadImage' v-if='!new_post.image' class="btn btn-primary">Upload <i
                    class="far fa-images"></i></button>
            <button @click='removeImage' v-if='new_post.image' class="btn btn-primary">Remove <i
                    class="far fa-images"></i></button>
            <button @click='publish' class="btn btn-primary float-right"
                :disabled='new_post.header.length == 0'>Post</button>
        </div>
        <button @click='m_showPostForm' v-else-if="this.$parent.userIsFollowing" class="btn btn-primary mx-auto d-flex">Create
            post</button>
        <div class="features-bar mt-3">
            <ul class="navbar my-auto feature-list">
                <li class="nav-item feature-item text-onism">
                    <div class="nav-link"><i class="fas fa-sort-amount-up-alt icon"></i> Top</div>
                </li>
                <li class="nav-item feature-item text-onism">
                    <div class="nav-link"><i class="fas fa-fire-alt icon"></i> Hot</div>
                </li>
                <li class="nav-item feature-item text-onism">
                    <div class="nav-link"><i class="fas fa-sun icon"></i> New</div>
                </li>
            </ul>
        </div>
        <div class="mt-2 posts-list" v-for='post in Posts' :key='post.id'>
                <Post :post='post' @reloadPost="reloadPost(post.id)">
                    
                </Post>

        </div>
    </div>
</template>

<script>
    import {
        mapState
    } from 'vuex';

    import Post from '../../components/Post.vue';
    export default {

        name: "CommunityHome",
        data() {
            return {
                
                v_showPostForm: false,
                new_post: {
                    header: '',
                    body: '',
                    image: null,
                },
                InsertImageBtn: null,
                ImageInput: null,
                
            }
        },
        components: {
            Post
        },
        created() {
            console.log(this.$parent.Posts);
        },  
        computed: {
            Posts() {
                return this.$parent.posts
            },
 
            showPostForm() {
                return this.v_showPostForm
            },

            ...mapState(['user']),
        },
        methods: {
            m_showPostForm() {
                this.v_showPostForm = true;
                console.log(this.showPostForm);
            },

            uploadImage() {
                let post_img_input = document.getElementById('post-image');
                post_img_input.click();
                post_img_input.onchange = () => {
                    this.showImage(event.target);
                }
            },
            showImage(input) {
                let that = this;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        let imageBase64 = e.target.result
                        $('#img-upload').attr('src', imageBase64);

                    }
                    reader.readAsDataURL(input.files[0]);
                    that.new_post.image = input.files[0]
                    console.log(that.new_post.image);
                }
            },
            removeImage() {
                document.getElementById('img-upload').src = '';
                this.new_post.image = null;
            },

            reloadPost(id) {
                this.$parent.loadSinglePost(id);
                console.log("POST RELOADED");
            },
            publish() {
                // Post the post
                let form_data = new FormData();
                let data = {
                    "header": this.new_post.header,
                    "file": this.new_post.image,
                    "body": this.new_post.body,
                    "community_id": this.$parent.current_community.id,
                };
                let that = this;


                Object.keys(data).forEach(key => {
                    form_data.append(key, data[key]);
                });
                console.log(form_data);
                axios.post("/api/post/", form_data, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'Accept': 'application/json'
                    }
                }).then(response => {
                    let data = response.data;
                    if (data["state"] == 1) {
                        this.community.posts.unshift(response.data.post);
                        this.new_post.title = this.new_post.header = "";
                        this.new_post.image = null;
                        // $('#img-upload').attr('src', "");
                    } else {
                        alert("Something Went Wrong!");
                    }
                }).catch(error => {
                    console.log(error);
                    alert("Something went wrong");
                })

            },
        }
    }

</script>

<style scoped>
.features-bar {
    background-repeat: repeat-x;
    /* min-height: 40px; */
    padding-left: 20px;
    padding-right: 20px;
    background-color: #fafafa;
    background-image: -moz-linear-gradient(top, #ffffff, #f2f2f2);
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#f2f2f2));
    background-image: -webkit-linear-gradient(top, #ffffff, #f2f2f2);
    background-image: -o-linear-gradient(top, #ffffff, #f2f2f2);
    background-image: linear-gradient(to bottom, #ffffff, #f2f2f2);
    background-repeat: repeat-x;
    border: 1px solid #d4d4d4;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 4px rgb(0 0 0 / 7%);
    -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
    box-shadow: 0 1px 4px rgb(0 0 0 / 7%);
}

.feature-list {
    list-style: none;
}

.feature-item {
    font-size:1.25em;
    cursor: pointer;
    color: #00adb5;
    border-radius: 50px;
    background-color: #00adb514;
}

    .topic-item a {
        font-size: 16px;
    }
    .posts-list >>> .post-content img {
        width: 100% !important;
    }
    #img-upload {
        width: 100% !important;
    }

        .card {
        border: none;
        background-color: white;
    }

    @media (max-width: 768px) {

        .posts-container {
        margin-top: 2em;
        }

    }

    @media (max-width: 576px) {
        .card {
            margin-top: 20px;
        }


    }
</style>
