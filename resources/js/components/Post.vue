<template>
    <div class="container-fluid">
        <div class="row panel panel-white post panel-shadow">
            <div class="col-12">
                <div class="row post-heading">
                    <div class="col-2 user-img-width">
                        <router-link :to="`/profile/${post.user.id}`" class="nostyle">
                            <img :src="post.user.avatar_full_path" class="img-circle avatar"
                            alt="user profile image">
                        </router-link>
                    </div>
                    <div class="col-8 col-sm-9">
                        <span class="row d-inline-flex">
                            <span class="col-12 post-header-details">
                                <span> 
                                    <router-link :to='`/profile/${post.user.id}`' class="nostyle username">
                                        {{post.user.name}}
                                    </router-link> 
                                    <span v-if='post.isShared'> shared a post by <a href='/profile/2'
                                        class="username nostyle">Ahmed Hanafi</a></span>
                                </span>
                            </span>
                            <span class="col-12">
                                <!-- <p class="text-onism" @click="reloadPost(post.id)">{{dateProcessor.sinceWhen(new Date(post.created_at))}}</p> -->
                                <router-link  class="text-onism nostyle" :to="`/community/${post.community.id}/post/${post.id}`" ><span @click="reloadPost(post.id)">
                                {{dateProcessor.sinceWhen(new Date(post.created_at))}}</span></router-link>
                            </span>
                        </span>
                    </div>
                    <div class="col-1 ml-auto">
                        <span id="action_menu_btn" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></span>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a v-if='post.user.id != user.id' class="dropdown-item" href="#">
                                <span ><i class="fas fa-user"></i></span> Report
                            </a>
                            <a v-if='post.user.id != user.id' class="dropdown-item" href="#">
                                <span><i class="far fa-flag"></i></span> Hide {{post.user.name.replace(/ .*/,'')}}'s posts
                            </a>
                            <a v-if='post.user.id != user.id' class="dropdown-item" href="#">
                                <span><i class="fas fa-ban"></i></span> Block {{post.user.name.replace(/ .*/,'')}}
                            </a>
                            <a @click='toggleEditMode' v-if='post.user.id == user.id' :href="post.comments == null ? `posts/${post.id}` : '#'" class="dropdown-item">
                                <span><i class="fas fa-edit"></i></span> Edit
                            </a>
                            <a v-if='post.user.id == user.id' @click="removePost" class="dropdown-item" href="#">
                                <span><i class="fas fa-trash-alt"></i></span> Remove
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-10">
                        <router-link class="nostyle" :to="`/community/${post.community_id}/post/${post.id}`">
                            <h3 @click="reloadPost(post.id)"><b>{{post.header}}</b></h3>
                        </router-link>
                        <p class="post-body"><span :class="(post.comments == null ? 'post-body-truncated' : '' )">{{post.body}}</span><a class="read-more" @click='expandPost'>read more</a></p>
                        <div>
                            <img :src="post.image_full_path" class="post-image">
                        </div>
                    </div>
                </div>
                <div class="row stats text-center">
                    <div class="col-4">
                        <button @click='likePost' :class="'btn btn-block btn-default stat-item like-btn' + (liked ? ' liked' : '')"><i
                                class="fa fa-thumbs-up icon"></i>{{likes_count}}</button>
                    </div>
                    <div class="col-4">

                                <router-link :to="post.comments == null ? `/posts/${post.id}` : ''" class="btn btn-block btn-default stat-item comment-btn">
                                        <i class="fa fa-comment-alt icon"></i>{{comments_count}}
                                </router-link>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-block btn-default stat-item share-btn"><i
                                class="fa fa-share icon"></i>{{post.shares_count}}</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</template>

<script>
import DateProcessor from '../services/Date.js';
import {mapState} from 'vuex';
    export default {
        props: ['post'],
        data() {
            return {
                like: this.post.current_user_liked,
                dateProcessor: new DateProcessor()
            }
        },
        created() {
            
        },
        computed: {
            liked() {
                return this.like
            },
            likes_count() {
                return this.post.likes_count
            },
            comments_count() {
                return this.post.comments_count;
            },
            ...mapState(['user'])
        },
        methods: {
            likePost() {
                let likeBtn = event.target
                axios.get(`/api/post/${this.post.id}/like`).then(response => {
                    if(response.data.state) {
                        this.post.likes_count = response.data.likes_count;
                        this.post.current_user_liked = true;
                        
                        if(likeBtn.classList.contains('icon'))
                            likeBtn = likeBtn.parentElement;
                        this.like = !this.like;
                        this.like ? likeBtn.classList.add('liked') : likeBtn.classList.remove('liked')
                    }
                })
                
            },
            toggleEditMode() {
                this.$emit('toggleEditMode');
            },
            expandPost() {
                event.target.previousElementSibling.classList.remove('post-body-truncated');
                event.target.parentElement.removeChild(event.target);
            },

            removePost() {
                let that = this;
                axios.post(`/api/post/${this.post.id}/delete`).then(response => {
                    if(response.data.state) {
                        this.$parent.posts = this.$parent.posts.filter(post => {
                            return that.post.id != post.id
                        });
                    }
                })
            },
            reloadPost(id) {
                this.$emit("reloadPost", id);
            }
        }
    }

</script>

<style scoped>


    .row {
        height: inherit !important;
    }

    .info {
        color: inherit;
    }

    .info:hover {
        text-decoration: none !important;
    }

    .panel {
        background-color: white;
        border: 1px solid #ddd;
        margin-bottom: 1em;
    }

    .user-img-width {
        max-width: 60px;
    }

    .post-header-details {
        line-break: anywhere;
    }

    .panel-white .panel-heading {
        color: #333;
        background-color: #fff;
        border-color: #ddd;
        padding-left: 1em;
        padding-right: 1em;

    }
    .post-image {
        width:100% !important;
    }
    .panel-white .panel-footer {
        background-color: #fff;
        border-color: #ddd;
    }

    .post .post-heading {
        height: 95px;
        padding-top: 20px;
    }

    .post .post-heading .avatar {
        width: 40px;
        height: 40px;
        display: inline;
    }

    .post .post-heading .meta .title {
        margin-bottom: 0;
    }

    .post .post-heading .meta .title a {
        color: black;
    }

    .post .post-heading .meta .title a:hover {
        color: #aaaaaa;
    }

    .post .post-heading .username {
        font-weight: 600;
        cursor: pointer;
    }

    .post-body {
        white-space: break-spaces;
    }
    .post .post-heading .meta .time {
        color: #999;
    }


    .post-options {
        display: inline;
        float: right;
        cursor: pointer;
    }

    .post .post-description {
        padding: 15px;
    }

    .post .post-description p {
        font-size: 14px;
    }

    .stats {
        margin: 10px 5px;
        padding-top: 10px

    }

    .stats .stat-item {
        border: 1px solid #ddd;
        border-radius: 5px;
        /* margin: 0 5px; */
    }

    .stats .stat-item:focus {
        box-shadow: none;
    }


    .stats .stat-item .icon {
        margin-right: 8px;
        color: #656565;
    }

    .liked {
        background-color: #00adb5;
        color: white;
        box-shadow: 0 0 0 0.08rem #00adb5 !important;
    }

    .liked .icon {
        color: white !important;
    }

    .post .post-footer {
        padding: 15px;
    }

    #action_menu_btn {
        cursor: pointer;
    }

    .dropdown-menu {
        /* left: auto; */
        right: -300%;
    }

    .post-body-truncated {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .read-more {
        color: #00adb5 !important;
    }
    .read-more:hover {
        text-decoration-line: underline;
        cursor: pointer;
    }

    @media (max-width: 992px) {
        .post-header-details {
            width: 95%;
        }

    }

</style>
