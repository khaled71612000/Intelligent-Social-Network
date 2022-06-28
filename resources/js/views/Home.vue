<template>
    <div class="row">
        <div class="col-12 col-sm-10 col-md-7 col-lg-6 mx-auto pt-5 px-4">
            <div class="features-bar">
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
                <Post
                :post='post'
                ></Post>
            </div>
        </div>
        <div class="col-1 d-flex ml-auto justify-content-end chat-col pr-3" style="z-index:9999">
            <div class="" v-if='this.activeChats.length > 0'>
                <div class="chat-content-container" v-for='chat in this.activeChats' :key='chat.id'>
                    <Chat :chat_id='chat.id' :friend='chat.friend'>
                    </Chat>
                </div>
            </div>
        </div>
        <div class="col-3 col-md-3 d-none d-md-block friend-list-col">
            <div class="card  friend-list-card float-right">
                <div class="card-header">Friends <span class="float-right toggler" @click='toggleFriendsList'><i v-if='displayFriendsList' class="fas fa-minus"></i><i v-else class="fas fa-plus"></i></span></div>
                <div class="friendsList" v-if='displayFriendsList'>
                    <div class="nearby-user" v-for="(friend, index) in user.friends" :key='friend.id'
                        @click="createChat(user.chats[index].id, friend)">
                        <div class="row align-items-center">
                            <div class="col-3 user-avatar-container">
                                <img :src='friend.avatar_full_path' :alt="`${friend.name}`" class="profile-photo-lg">
                                <span v-if='online_friends_ids.includes(friend.id)' class="online_icon"></span>
                            </div>
                            <div class="col-9 text-left">
                                <p class="profile-link my-auto">{{friend.name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if='displayFriendsList'> 
                    <input class="form-control" type="text" placeholder="Type a name..">
                </div>
                

            </div>


        </div>

    </div>




</template>

<script>
    import {
        mapState
    } from 'vuex';
    import Chat from '../components/Chat.vue';
    import Post from '../components/Post.vue';

    export default {
        data() {
            return {
                // activeChats: []
                globalChannels: this.$store.state.channels,
                v_displayFriendsList: true,

                online_friends_ids: [1, 3],
                posts: []
            }
        },
        created() {
            let that = this;
            // listen for InitChat notification
            // window.Pusher.channels['channels']["private-notification-" + this.user.id].bind("InitChat", (event) => {
            //     console.log(event);
            //     this.recieveChatInit(event.initiator_id, event.chat_id)
            //     this.globalChannels['private-chat-' + event.chat_id].bind('MessageSent')
            // })
            axios.get('/api/home').then(response => {
                if(response.data.state) {
                    response.data.followed_communities.map(community => {
                        community.posts.forEach(post => {
                            that.posts.push(post);
                        })
                    })
                }
            })
        },
        components: {
            Chat,
            Post
        },
        computed: {
            activeChats: {
                get() {
                    return this.$store.state.activeChats
                },
                set(value) {
                    this.$store.commit("SET_ACTIVE_CHATS", value);
                }
            },
            Posts() {
                return this.posts
            },
            displayFriendsList() {
                return this.v_displayFriendsList;
            },
            ...mapState(['user', 'token']),
        },
        methods: {
            createChat(chat_id, friend) {
                // let chat = `<Chat
                // id='${chat_id}'
                // friend=${friend}
                // ><Chat>`;
                // document.querySelector('#chat_section').append(chat);
                // new Chat({props: {id:chat_id, friend:friend}}).$mount();
                if (!this.activeChats.find(chat => chat.id == chat_id)) {
                    let activeChatsCopy = this.activeChats.slice();
                    if(activeChatsCopy.length > 0) {
                        activeChatsCopy[activeChatsCopy.length-1].isMinimized = true;
                    }
                    activeChatsCopy.push({
                        id: chat_id,
                        friend: friend,
                        isMinimized: false
                    });
                    this.activeChats = activeChatsCopy.slice();
                }
                else {
                    let activeChatsCopy = this.activeChats.slice();
                    activeChatsCopy.forEach(chat => {
                        if(chat.id != chat_id)
                            chat.isMinimized = true;
                        else
                            chat.isMinimized = false;
                    });
                    this.activeChats = activeChatsCopy.slice();
                }

            },
            toggleFriendsList() {
                this.v_displayFriendsList = !this.v_displayFriendsList;
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

.nearby-user{
  padding: 5px 10px;
  border-bottom: 1px solid #f1f2f2;
  cursor: pointer;
}

img.profile-photo-lg{
  height: 40px;
  width: 40px;
  border-radius: 50%;
}

.people-nearby {
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
    .friendsList {
        overflow-y: scroll;
        overflow-x: hidden;
        height: 77.5vh;
    }
    .friendsList::-webkit-scrollbar {
        width: 3px;
    }

    .friend-list-card {
        position: sticky;
        top: 61.5px;
        right:0;
        z-index: 0;
        max-width: 40vh;
        min-width: 30vh;
        width: 35vh;
    }
    .friend-list-col {
        max-width: 40vh;
        min-width: 30vh;
        width: 35vh;
        padding-left: 0px;
        padding-right: 0px;
    }
    .chat-col {
        padding-right: 0px;
    }
    .chat-content-container {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        right: 0;
        z-index: 0;
    }
.online_icon {
        position: absolute;
        height: 10px;
        width: 10px;
        background-color: #4cd137;
        border-radius: 50%;
        bottom: 0.2em;
        right: 0.4em;
        border: 1.5px solid white;
    }
</style>
