<template>
    <div>
        <input accept="Image/*"  style="display:none;" type="file"
                                 id="post-image" name="file" >
        <div class="bg-image" :style="{backgroundImage: `url(${current_community.cover_full_path})`}"></div>
        <div class="container-fluid">
            <div class="row justify-content-center justify-content-md-start mt-2">
                <div class="d-md-block d-none col-lg-1 col-sm-1"></div>
                <div class="col-sm-10 col-md-7 col-lg-6 col-12 text-center text-md-center">
                    <router-link class='text-onism nostyle' :to="`/community/${current_community.id}`">
                        <h1 @click="loadCommunity(current_community.id)">{{current_community.title}}</h1>
                    </router-link>
                    
                    <div class="d-inline">
                         <span v-if='userIsFollowing'>
                            <button class="btn-primary btn px-5" data-toggle="dropdown">Followed ✔</button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a  class="dropdown-item nostyle" @click="unfollow(current_community.id)">
                                    <span><i class="fas fa-times"></i></span> Unfollow
                                </a>
                            </div>
                        </span>
                        <button v-else @click='follow(current_community.id)' class='btn px-5 btn-outline-primary'>Follow</button>
                        <span class="div mx-2"></span>
                        <span class="text-onism">{{current_community.followers}} Followers</span>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-4 text-center mt-2">
                    <div class="dropdown">
                        <button v-if='current_community.owner_id == user.id' class='btn btn-outline-primary btn-sm' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item btn" @click='toggleEditMode'>Edit</a>
                        <a class="dropdown-item btn">Change Privacy</a>
                        <a class="dropdown-item btn"  @click='deleteCommunity' href="#">Delete</a>
                    </div>
                    </div>
                </div>

            </div>
            <div class="row py-4 justify-content-center justify-content-md-start">
                <div class="d-md-block d-none col-lg-1 col-sm-1"></div>
                <router-view></router-view>
                <div class="col-10 col-md-4 col-sm-8 order-0 order-md-1">
                    <div class="card text-center">
                        <div class="card-body p-0">
                            <div class="bg-onism p-1">
                                <h5 class="card-title text-white my-auto">About</h5>
                            </div>
                            <div class="p-3 about-content">
                                <h6 class="card-subtitle mb-2 text-onism">Created at {{dateProcessor.formatDateYMD(new Date(current_community.created_at))}}</h6>
                                <textarea v-if='editMode' style="width:100%; height:150px;" v-model='current_community.description'></textarea>
                                <p class="card-text" v-else>
                                    {{current_community.description}}
                                </p>
                            </div>
                            <span class="badge badge-onism mx-1" v-for='tag in current_community.tags' :key='tag.id'>{{tag.name}}</span>
                        </div>
                    </div>
                    <div class="card text-center mt-3">
                        <div class="card-body p-0">
                            <div class="bg-onism p-1">
                                <h5 class="card-title bg-onism text-white my-auto">Related Communities</h5>
                            </div>
                            <div class="row py-2" v-for='related_community in related_communities' :key='related_community.id'>
                                <div class="col-6 my-auto">
                                     <!-- <router-link :to='`/community/${related_community.id}`' class="nostyle text-onism">
                                        {{related_community.title}}
                                     </router-link> -->
                                     <div class="nostyle text-onism rl-title" @click="loadCommunity(related_community.id)">
                                         {{related_community.title}}
                                     </div>
                                </div>
                                <div class="col-6">
                                    <span v-if='userIsFollowingThis(related_community.id)'>
                                    <button class="btn-primary btn" data-toggle="dropdown">Followed ✔</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a  class="dropdown-item nostyle" @click="unfollow(related_community.id)">
                                            <span><i class="fas fa-times"></i></span> Unfollow
                                        </a>
                                    </div>
                                    </span>
                                    <button v-else @click='follow(related_community.id)' class='btn btn-outline-primary'>Follow</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
 
            </div>
<!-- 
            <div class="row justify-content-center my-3">
                <div class="col-md-1 col-lg-1"></div>
                <div class="col-12 col-sm-10 col-md-7 col-lg-6">
                  <Post></Post>
                </div>
                <div class="d-md-none d-lg-block col-lg-1"></div>
                <div class="col-md-4 col-lg-4 col-sm-6 d-none d-md-block"></div>
            </div> -->

        </div>
    </div>
</template>

<script>
import Post from '../components/Post.vue';
import FullPost from '../components/FullPost.vue';
import  DateProcessor from '../services/Date.js';

import {
        mapState
    } from 'vuex';
export default {
        data() {
            return {
                community:{
                    title:"",
                    cover_full_path:"",//"/storage/files/community/cover/default.jpg",
                    description:"",
                    followers:"",
                    created_at:new Date(),
                    posts:[],
                    tags:[],
                    related_communities:[]
                },
                postChannel:null,
                dateProcessor: new DateProcessor(),
                posts: [],
                single_post:null,
                user:this.$store.state.user,
                shit:3,
                edit: false,
                
            }
        },
        created() {
            let community_id = this.$route.params.id
            let post_id = this.$route.params.post_id
            if(post_id)
                this.loadSinglePost(post_id)
            else
                this.loadCommunity(community_id);
            
        },
        computed: {
            editMode() {
                return this.edit;
            },

            current_community() {
                return this.community;
            },
            related_communities() {
                return this.community.related_communities;
            },

            userIsFollowing: {
                get() {
                    let that = this;
                    return this.FollowedCommunities.find(community => {
                        return community.id == that.current_community.id
                    }) != null;
                },
            },
            FollowedCommunities: {
                get() {
                    return this.$store.state.user.followed_communities;
                },
                set(value) {
                    this.$store.commit("user/SET_FOLLOWED_COMMUNITIES", value);
                }
            },

            
        },
        mounted() {

            if(this.current_community) {
                document.getElementsByClassName('bg-image')[0].style.backgroundImage = this.current_community.cover_full_path;
            }

        },
        methods: {
            
            toggleEditMode() {
                this.edit = !this.edit;
                let btn = event.target;
                if (this.edit) {
                    btn.innerHTML = 'Save';
                    this.updateCommunity();
                } else
                    btn.innerHTML = 'Edit';
            },
            loadCommunity(id) {
                axios.get(`/api/community/${id}`).then(response => {
                    if(response.data.state){
                        let oldID = this.$route.params.id;
                        this.community = response.data.community;
                        this.posts = this.community.posts;
                        // update route with new parameter without reloading
                        history.pushState(
                            {},
                            null,
                            this.$route.path.replace(oldID, this.community.id)
                        )
                    }
                })
                // this.$router.go(this.$router.currentRoute)
            },
            loadSinglePost(id) {
                let that = this;
                axios.get(`/api/post/${id}`).then(response => {
                    if(response.data.state){
                        that.single_post = response.data.post;
                        that.community = this.single_post.community;
                        // connect to post channel to listen to new comments
                        if(that.postChannel)
                            that.postChannel.disconnect();
                        that.postChannel = window.Pusher.subscribe('post-' + response.data.post.id);
                        console.log(that.postChannel);
                        that.postChannel.bind('CommentCreated', event => {
                            that.single_post.comments.push(event.comment);
                        })

                    }
                })
            },

            addToStore(storeArray, newItem) {
                let oldItems = storeArray.slice();
                let combinedItems = oldItems.concat(newItem);
                return combinedItems.slice();
            },

            async follow(community_id)  {
                if (!this.userIsFollowingThis(community_id)){
                    let newNumberOfFollowers = await this.$store.dispatch("user/followCommunity", community_id);
                    this.community.followers = newNumberOfFollowers ?? this.community.followers;                    
                }
                    
            },

            async unfollow(community_id) {
                if(this.userIsFollowingThis(community_id)) {
                    let newNumberOfFollowers = await this.$store.dispatch("user/unfollowCommunity", community_id);
                    this.community.followers = newNumberOfFollowers ?? this.community.followers;
                    
                }
            },

            userIsFollowingThis(community_id) {
                // Check if user is following a specific community
                return this.FollowedCommunities.find(community => {
                    return community.id == community_id
                }) != null;
            },

  
            updateCommunity() {
                // alert first
                // update community by id
            },
            deleteCommunity() {
                // alert first
                // delete community by id
            }
        },
        components: {
            Post,
            FullPost
        },
        destroyed() {
            if(this.postChannel)
                this.postChannel.disconnect();
        }
    }

</script>

<style scoped>




    .bg-image {
        height: 33vh;
        background-size: cover;
        background-position-y: center;
    }

    .card {
        border: 1px solid #ddd !important;
    }

    .rl-title {
        font-weight: 900;
        cursor: pointer;
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
