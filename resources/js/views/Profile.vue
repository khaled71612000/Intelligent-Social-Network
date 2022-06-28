<template>
        
        <div class="main-body container">
            <div class="d-none" v-if='authorView'>
                <input type="file" id="cover-input" class="d-none">
                <input type="file" id="avatar-input" class="d-none">
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 mb-3">
                    <div class="row row-noheight">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body cover">
                                    <img class="card-img-top" id="user-cover"
                                        :src="user.cover_full_path"
                                        alt="">
                                    <a @click='changeCover' v-if='authorView' class='btn-change-cover nostyle'>
                                        <i class="icon fas fa-camera"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="profile-badge">
                                <div>
                                    <div class="menu-container dropleft">
                                        <span id="action_menu_btn" class='btn btn-outline-primary btn-sm' data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></span>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a  class="dropdown-item" href="#" v-if='authorView'>
                                                <span><i class="fas fa-plus"></i></span> New Community
                                            </a>
                                            <a class="dropdown-item" href="#" v-if='authorView' >
                                                <span><i class="fas fa-cog"></i></span> Settings
                                            </a>
                                            <a class="dropdown-item" href="#" v-if='!authorView'>
                                                <span><i class="far fa-flag"></i></span> Report
                                            </a>
                                            <a class="dropdown-item" href="#" v-if='!authorView'>
                                                <span><i class="fas fa-ban"></i></span> Block
                                            </a>
                                        </div>
                                    </div>
                                    <button v-if='authorView && !profileEditMode' @click='toggleProfileEditMode' class='btn btn-primary btn-sm btn-edit'><i class="fas fa-edit"></i></button>
                                    <button v-if='authorView && profileEditMode' @click='toggleProfileEditMode' class='btn btn-primary btn-sm btn-edit'>Save</button>
                                    <img :src="user.avatar_full_path"
                                        alt="Admin" class="rounded-circle user-profile-avatar" width="150">

                                    <a v-if='authorView' class='btn-change-avatar nostyle'>
                                        <i class="icon fas fa-camera"></i>
                                    </a>
                                </div>

                                <div class="mt-3">
                                    <h4>{{user.name}}</h4>
                                    <div v-if='profileEditMode && authorView'>
                                        <input type="text" v-model='user.nickname' class="form-control text-center mx-auto my-2 input-w-50" id="nickname" placeholder="Tag or Nickname">
                                        <textarea type="text" v-model='user.bio' class="form-control text-center mx-auto my-2 input-w-75" id="bio" placeholder="Bio"></textarea>
                                    </div>
                                    <div v-else>
                                        <p class="text-muted font-size-sm">{{user.nickname}}</p>
                                        <p class="font-size-sm input-w-75 mx-auto bio">{{user.bio}}</p>
                                    </div>
                                    <button  @click="cancelFriendRequest" v-if='iSentFriendRequest' class="btn btn-primary"><i class="fas fa-user-plus"></i>Friend Request Sent</button>
                                    <button @click="acceptFriend"  v-else-if='heSentMeFriendRequest' class="btn btn-outline-primary"><i class="fas fa-user-plus"></i> Accept Friend</button>
                                    <button @click="addFriend"  v-else-if='!authorView && !isMyFriend' class="btn btn-outline-primary"><i class="fas fa-user-plus"></i> Add Friend</button>
                                    <span v-if='!authorView && isMyFriend'>
                                        <button  v-if='!authorView && isMyFriend' class="btn btn-outline-primary" data-toggle="dropdown"><i class="fas fa-user-check"></i> Friend</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a  class="dropdown-item" href="#" @click="removeFriend">
                                                <span><i class="fas fa-user-times"></i></span> Unfriend
                                            </a>
                                        </div>
                                    </span>
                                    <button v-if='!authorView' class="btn btn-outline-primary">Follow</button>
                                    <button v-if='!authorView' class="btn btn-primary"><i class="fas fa-comments"></i> Message</button>
                                </div>
                            </div>
                            <div class="row text-center mt-3 justify-content-center">
                                <div class="col-4">
                                    <router-link class="nostyle" :to="{name:'user_main_profile'}">
                                    <div class="btn tab btn-outline-primary btn-block bg-white">
                                            <i class="fas fa-home"></i> Main
                                    </div>
                                    </router-link>
                                </div>
                                <div class="col-4" v-if='authorView'>
                                    <router-link class="nostyle" :to="{name:'user_friends'}">
                                    <div class="btn tab btn-outline-primary btn-block bg-white">
                                            <i class="fas fa-user-friends"></i> Friends
                                    </div>
                                    </router-link>
                                </div>
                                <div class="col-4" v-if='authorView'>
                                    <router-link class="nostyle" :to="{name:'user_communities'}">
                                    <div class="btn tab btn-outline-primary btn-block bg-white">
                                            <i class="fas fa-user-friends"></i> Communities
                                    </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>

                    <router-view></router-view>

                
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
                authorView:this.$route.params.id == this.$store.state.user.id,
                user_to_view:this.$store.state.user,


                profileEditMode:false,
                oldUserData:null, // used to check for any updates before notifying server
                friends_ids:this.$store.state.user.friends.map(friend => friend.id),
            }
        },

        created() {
            let user_id = this.$route.params.id;
            if(user_id != this.user.id) {
                axios.get(`/user/${user_id}`).then(response => {
                    this.user_to_view = response.data.user;
                })
            }
            else {
                console.log("SAME USER");
            }
        },

        computed: {
            getProfileEditMode() {
                return this.profileEditMode;
            },
            getCommunities() {
                return this.user_to_view.followed_communities
            },
            Friends: {
                get() {
                    return this.$store.state.user.friends
                },
                set(value) {
                    this.$store.commit("user/SET_FRIENDS", value);
                }
            },

            SentRequests: {
                get() {
                    return this.$store.state.user.sentRequests;
                },
                set(value) {
                    this.$store.commit("user/SET_SENT_REQUESTS", value);
                }
            },
            ReceivedRequests: {
                get() {
                    return this.$store.state.user.receivedRequests;
                },
                set(value) {
                    this.$store.commit("user/SET_RECEIVED_REQUESTS", value);
                }
            },
            user() {
                return this.user_to_view;
            },

            isMyFriend() {
                let that = this;
                return that.Friends.find(friend => {
                    return friend.id == that.user_to_view.id;
                })
            },

            iSentFriendRequest() {
                let that = this;
                return that.SentRequests.find(request => {
                    return request.user.id == that.user_to_view.id;
                }) != null;
            },

            heSentMeFriendRequest() {
                let that = this;
                return that.ReceivedRequests.find(request => {
                    return request.user.id == that.user_to_view.id;
                }) != null;
            },
            // ...mapState(['user']),
        },
        
        methods: {
            changeCover() {
                console.log('Hey');
                document.getElementById('cover-input').click();
            },
            toggleProfileEditMode() {
                this.profileEditMode = !this.profileEditMode;
                if(this.profileEditMode)
                    this.oldUserData = JSON.parse(JSON.stringify(this.user));
                else {
                    this.submitUpdates();
                    this.oldUserData = null;
                }
            },
            

            submitUpdates() {
                let privacyIsChanged = ! (JSON.stringify(this.user.privacy) === JSON.stringify(this.oldUserData.privacy));
                let bio_nickname_IsChanged = ! (JSON.stringify(this.user.bio+this.user.nickname) === JSON.stringify(this.oldUserData.bio+this.oldUserData.nickname));
                if(privacyIsChanged || bio_nickname_IsChanged) {
                    console.log("DIFFERENT, submit changes to server");
                }
                else {
                    console.log("SAME don't sent a thing");
                }
            },




            addFriend() {
                this.$store.dispatch("user/sendFriendRequest", this.user_to_view);
            },
            cancelFriendRequest() {
                let sure = confirm("Are you sure you want to delete the friendship request?");
                if(sure)
                    this.$store.dispatch("user/cancelFriendRequest", this.user_to_view.id);
                    
            },
            acceptFriend() {
                this.$store.dispatch("user/acceptFriend", this.user_to_view.id);
            },
            refuseRequest() {

            },
            removeFriend() {
                this.$store.dispatch('user/removeFriend', this.user_to_view.id);
            }
        }
    }

</script>

<style scoped>
    .cover {
        z-index: 0;
        position: relative;
        padding: 0px !important;

    }
    .posts-list >>> .post-content img {
        width: 100% !important;
    }
    .row {
        height: inherit;
    }
    .cover:hover .btn-change-cover {
        display: block;
    }

    .user-profile-avatar:hover+.btn-change-avatar {
        display: block;
    }

    .btn-change-avatar:hover {
        display: block;
    }

    .btn-change-cover,
    .btn-change-avatar {
        display: none;
        position: absolute;
        bottom: 10px;
        height: 30px;
        cursor: pointer;
    }

    .btn-change-cover {
        right: 10px;
    }

    .btn-change-avatar {
        top: 0;
        left: 0;
        right: -5em;
    }

    .btn-change-cover .icon {
        font-size: 1.5em;
        color: white;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 0.2em;
        border-radius: 25px;

    }

    .btn-change-avatar .icon {
        font-size: 1.5em;
        color: white;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 0.2em;
        border-radius: 25px;
    }

    #user-cover {
        object-fit: cover;
        max-height: 50vh;
        min-height: 40vh;
    }

    .profile-badge {
        text-align: center;
        z-index: 1;
        position: relative;
        background-color: white;
        padding-bottom: 2em;
    }

    .profile-badge img {
        margin-top: -8em;
        width: 150px;
        height: 150px;
        object-fit: cover;
    }



    .card, .profile-badge {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
    }

    .tab {
        background-color: white;
        font-size: 16px;
    }
    .menu-container {
        position: absolute;
        right: 10px;
        top: 10px;
    }
    .btn-edit {
        position: absolute;
        right: 50px;
        top: 10px;
    }



    
</style>
