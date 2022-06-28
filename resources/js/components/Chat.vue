<template>


    <!-- <ul class="chat" id="chatBox" style="height:75vh;overflow-y:scroll;" v-if="chatID">
                    <li class="left clearfix" v-for="(message) in reactiveChatHeads[chatID].messages" :key='message.id'>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font">
                                    {{ message.user_id == user.id ? 'You' : currentChatFriend.name }}
                                </strong>
                            </div>
                            <p style="margin-bottom:0;">
                                {{ message.message }}
                            </p>
                            <p style="font-size:10px;">{{ formatDates(new Date(message.created_at)) }}</p>
                        </div>
                    </li>
                </ul>

                <div class="input-group" v-if="currentChatId">
                    <input id="btn-input" type="text" name="message" class="form-control input-sm"
                        placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage">

                    <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                            Send
                        </button>
                    </span>
                </div> -->

    <!-- <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Friends</div>
                    <div v-for="(friend, index) in user.friends" :key='friend.id' @click="initChat(user.chats[index].id, friend)">
                        {{friend.name}}
                    </div>
                </div>
            </div> -->

    <!-- <div class="container d-flex justify-content-center">
    <div class="card mt-5">
        <div class="d-flex flex-row justify-content-between p-3 adiv text-white"> <i class="fas fa-chevron-left"></i> <span class="pb-3">Live chat</span> <i class="fas fa-times"></i> </div>
        <div class="messages-container">
            <div class="d-flex flex-row p-3"> <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-7.png" width="30" height="30">
                <div class="chat ml-2 p-3">Hello and thankyou for visiting birdlymind. Please click the video above</div>
            </div>
            <div class="d-flex flex-row p-3">
                <div class="bg-white mr-2 p-3"><span class="text-muted">Hello and thankyou for visiting birdlynind.</span></div> <img src="https://img.icons8.com/color/48/000000/circled-user-male-skin-type-7.png" width="30" height="30">
            </div>
            <div class="d-flex flex-row p-3"> <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-7.png" width="30" height="30">
                <div class="myvideo ml-2"><img src="https://imgur.com/GOxU1jx.png" width="200"></div>
            </div>
            <div class="d-flex flex-row p-3"> <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-7.png" width="30" height="30">
                <div class="chat ml-2 p-3"><span class="text-muted dot">. . .</span></div>
            </div>
        </div>

        <div class="form-group px-3 input-container my-auto py-2"> <input class="form-control message-input" type='text' placeholder="Type your message"> </div>
    </div>
</div> -->
    

        <div v-else class="chat-container d-flex justify-content-end h-100 w-100">

            <div class="img_cont chat-minimized-icon d-flex flex-column  align-self-end"
                v-if='minimized' @click='$parent.createChat(chat_id, friend)' :title="this.friend.name">
                <img :src="friend.avatar_full_path" class="rounded-circle user_img">
                <span class="online_icon"></span>
            </div>
            <div v-else class=" d-flex justify-content-start chat">
                <div class="card">
                    <div class="card-header msg_head">
                        <div class="d-flex bd-highlight align-items-center p-1">
                            <div class="img_cont">
                                <img :src="friend.avatar_full_path"
                                    class="rounded-circle user_img">
                                <span class="online_icon"></span>
                            </div>
                            <div class="user_info mb-0">
                                <span>{{friend.name}}</span>
                                <p class="mb-0">{{friend.personality}} | {{friend.learning_style}}</p>
                            </div>
                        </div>


                        <div class="dropdown" style="position:static !important;">
                            <span id="action_menu_btn" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></span>
                            <div class="dropdown-menu">
                                <div class="dropdown-submenu" tabindex="-1" style="position:static !important;">
                                    <div class="dropdown-submenu dropright">
                                        <button class="dropdown-item drop-right dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown-sub" aria-haspopup="true"
                                            aria-expanded="false">
                                            <span><i class="fas fa-user-shield"></i></span> Insights
                                        </button>


                                        <div class="dropdown-menu">
                                            <router-link class="dropdown-item"  :to='`/insights/personality/${friend.personality}`'>
                                                <span><i class="fas fa-user"></i></span> Personality
                                            </router-link>
                                            <router-link class="dropdown-item"  :to='`/insights/relationship/${user.personality}/${friend.personality}`'>
                                                <span><i class="far fa-handshake"></i></span> Relationship
                                            </router-link>
                                            <router-link class="dropdown-item"  :to='`/insights/learning/${friend.learning_style}`'>
                                                <span><i class="fas fa-brain"></i></span> Learning Style
                                            </router-link>
                                        </div>


                                    </div>
                                </div>
                                <a class="dropdown-item" href="#">
                                    
                                </a>
                                <router-link class="dropdown-item"  :to='`/profile/${friend.id}`'>
                                    <span><i class="fas fa-user-circle"></i></span> View Profile
                                </router-link>
                                <a class="dropdown-item" href="#">
                                    <span><i class="far fa-flag"></i></span> Report
                                </a>
                                <a class="dropdown-item" href="#">
                                    <span><i class="fas fa-ban"></i></span> Block
                                </a>
                            </div>
                        </div>
                        <span id="action_minimize_btn" @click='toggleChat'>
                            <i v-if='minimized' class="far fa-window-maximize"></i>
                            <i v-else class="fas fa-minus"></i>
                        </span>
                        <span id="action_exit_btn" @click='closeChat'><i class="fas fa-times"></i></span>
                        <div class="action_menu">
                            <ul>
                                <li><i class="fas fa-user-circle"></i> View profile</li>
                                <li><i class="fas fa-users"></i> Add to close friends</li>
                                <li><i class="fas fa-plus"></i> Add to group</li>
                                <li><i class="fas fa-ban"></i> Block</li>
                            </ul>
                        </div>
                    </div>
                    <div :class="'card-body msg_card_body' + (minimized ? ' d-none': '')" :id="`chatBox-${chat_id}`">
                        <div v-if='reactiveMessages == null'>
                            <!-- No messages (New Chat) -->
                        </div>
                        <div v-else-if='reactiveMessages.length == 0'>
                            <div class="ph-item p-0">
                                <div class="ph-col-12">
                                    <div class="ph-row">
                                        <div class="ph-col-2 empty"></div>
                                        <div class="ph-col-10 big-3"></div>
                                    </div>
                                </div>
                                <div class="ph-col-2 mt-auto img_cont">
                                    <div class="ph-avatar user_img" style="min-width:100% !important;"></div>
                                </div>
                                <div>
                                    <div class="ph-row">
                                        <div class="ph-col-10 big-3"></div>
                                        <div class="ph-col-2 big-3 empty"></div>
                                    </div>
                                    <div class="ph-row">
                                        <div class="ph-col-12 big-3"></div>
                                        <!-- <div class="ph-col-4 big-3 empty"></div> -->
                                    </div>
                                </div>




                                <div class="ph-col-12">
                                    <div class="ph-row">
                                        <div class="ph-col-4 empty"></div>
                                        <div class="ph-col-8 big-3"></div>
                                    </div>
                                </div>
                                <div class="ph-col-2 mt-auto img_cont">
                                    <div class="ph-avatar user_img" style="min-width:100% !important;"></div>
                                </div>
                                <div>

                                    <div class="ph-row">
                                        <div class="ph-col-12 big-3"></div>
                                        <!-- <div class="ph-col-4 big-3 empty"></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else class="inner-chat-container"  v-for="(message) in reactiveMessages" :key='message.id'>

                            <div class="d-flex justify-content-end mb-4" v-if='message.user_id == user.id'>
                                <div class="msg_cotainer_send">
                                    {{message.message}}
                                    <span class="msg_time_send">{{ formatDates(new Date(message.created_at)) }}</span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-start mb-4" v-else>
                                <div class="img_cont_msg mt-auto">
                                    <img :src="friend.avatar_full_path"
                                        class="rounded-circle user_img_msg">
                                </div>
                                <div class="msg_cotainer">
                                    {{message.message}}
                                    <span class="msg_time">{{ formatDates(new Date(message.created_at)) }}</span>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div :class="'card-footer' + (minimized ? ' d-none': '')">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                            </div>
                            <textarea name="message" v-model="newMessage" @keyup.enter="sendMessage" class="form-control type_msg"
                                placeholder="Type your message..."></textarea>
                            <div class="input-group-append">
                                <span class="input-group-text send_btn" @click="sendMessage"><i class="fas fa-location-arrow"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="img_cont chat-minimized-icon img_cont chat-minimized-icon d-flex flex-column justify-content-end align-items-end align-self-end align-content-end" @click='toggleChat' title="Khalid Elsayed">
                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
                <span class="online_icon"></span>
            </div> -->
        </div>
</template>

<script>
    import {
        mapState
    } from 'vuex';
    //import Echo from 'laravel-echo';
    import Vue from 'vue';

    export default {
        props: ['chat_id', 'friend'],
        data() {
            return {
                // message: '',
                index: this.$parent.activeChats.findIndex(chat => chat.id == this.chat_id),
                newMessage: '',
                messages: [],
                friends: [],
                currentChatId: null,
                currentChatFriend: null,
                chatHeads: {},
                pusher: window.Pusher,
                channels: window.Pusher.channels,
                urlREGEX: new RegExp(
                    /https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,}/
                )

            }
        },
        computed: {
            chatID() {
                return this.currentChatId;
            },
            friendID() {
                return this.currentChatFriendId
            },
            globalChannels: {
                get() {
                    return this.$store.state.channels
                },
                set(value) {
                    this.$store.commit("ADD_CHANNEL", value);
                }
            },
            reactiveChatHeads() {
                return this.chatHeads
            },
            reactiveMessages() {
                return this.messages;
            },
            minimized: {
                get() {
                    let index = this.$store.state.activeChats.findIndex(chat => chat.id == this.chat_id)
                    return this.$store.state.activeChats[index].isMinimized
                },
                set(value) {
                    this.$store.commit('SET_CHAT_MINIMIZED', {chat_id:this.chat_id, isMinimized:value})
                }
            },
            ...mapState(['user', 'token']),
        },
        created() {

            console.log(window.Pusher);

            

            
            //this.fetchFriends();
                // console.log("HEEEEEEEY");
                // console.log(this.channels['channels']);
                
            // this.Echo = new Echo({
            //     broadcaster: 'pusher',
            //     key: "loool",//process.env.MIX_PUSHER_APP_KEY,
            //     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
            //     wsHost: window.location.hostname,
            //     wsPort: 6001,
            //     wssPort: 6001,
            //     forceTLS: false,
            //     disableStats: true,
            //     encrypted: true,
            //     auth: {
            //         headers: {
            //             "Authorization": `Bearer ` + this.$props.token
            //         }
            //     }

            // });
            // this.Echo.private('chat')
            //     .listen('MessageSent', (e) => {
            //         console.log(e)
            //         this.messages.push({
            //             message: e.message.message,
            //             user: e.user,
            //             created_at: new Date()
            //         });
            //         this.scrollChat()
            //     });
            // this.Echo.join("mylolchannel")
            //     .here(users => {
            //         this.users = users;
            //     })
            //     .joining(user => {
            //         this.users.push(user);
            //         console.log("USER " + user.name + " JOINED");
            //     })
            //     .leaving(user => {
            //         this.users.splice(this.users.indexOf(user));
            //         console.log("USER " + user.name + " LEFT");
            //     })
        },
        mounted: function () {
            console.log('Component mounted.')
            //this.fetchChatMessages();
            //console.log(this.Echo)
            this.initChat(this.chat_id, this.friend)

        },
        methods: {
            fetchChatMessages() {
                axios.get('/chat/' + this.chat_id).then(response => {
                    console.log(response.data)
                    // window.Vue.set(this.chatHeads, chat_id, response.data);
                    //this.currentChatId = chat_id;
                    this.establishLiveChat();
                });
            },
            fetchFriends() {
                axios.get('/test', {
                    // headers: {
                    //     "Authorization": `Bearer ` + this.$props.token
                    // }
                }).then(response => {
                    this.user = response.data;
                    this.friends = this.user.friends;
                    this.token = this.user.token;
                    console.log(this.friends);


                });
            },
            initChat(chat_id, friend) {
                if (!this.chatHeads[chat_id]) {
                    let that = this;
                    let data = {
                        "initiator_id": this.user.id,
                        "target_id": this.friend.id,
                    }
                    axios.post("chat/" + this.chat_id + "/init", data)
                        .then(response => {
                            console.log(response.data)
                            // window.Vue.set(this.chatHeads, chat_id, response.data);
                            this.messages = response.data.messages;
                            // this.currentChatId = chat_id;
                            this.currentChatFriend = this.friend;
                            this.establishLiveChat();

                            this.scrollChat();
                        });
                    //this.fetchChatMessages(chat_id);
                } else {
                    // this.currentChatId = chat_id;
                    this.currentChatFriend = this.friend;
                }

            },
            recieveChatInit(initiator_id, chat_id) {
                if (!this.chatHeads[chat_id]) {
                    this.fetchChatMessages(chat_id);
                }
            },
            establishLiveChat() {
                
                let channelName = "private-chat-" + this.chat_id;
                if(!this.globalChannels.includes(channelName)) {
                    // let globalChannelsCopy = this.globalChannel.slice();
                    // globalChannelsCopy.push(channelName)
                    this.globalChannels = this.globalChannels.concat(channelName);
                    
                }
                let chatChannel = window.Pusher.subscribe(channelName);
                console.log(window.Pusher.channels);
                chatChannel.bind("pusher:subscription_succeeded", function () {
                    console.log("CONNECTED");

                });
                chatChannel.bind("pusher:subscription_error", function (err) {
                    console.log(err);
                });
                let that = this;
                chatChannel.bind("MessageSent", function (response) {
                    if (response.message.user_id != that.user.id || true) {
                        that.messages.splice(that.messages.length, 0,
                            response.message)
                        console.log(response.user.name + " : " + response.message);
                        that.scrollChat();
                    } else {
                        console.log("You still send the message twice :/ ");
                    }
                })


                // let that = this;
                // this.channel.bind("pusher:subscription_succeeded", function (members) {
                // 	members.each(member => {
                // 		that.users.push(member.info)
                // 	})
                // })
                // this.channel.bind("pusher:member_added", function (member) {
                // 	that.users.push(member.info);
                // })
                // this.channel.bind("pusher:member_removed", function (member) {
                // 	that.users.splice(that.users.indexOf(member.info));
                // })
            },

            scrollChat() {
                if(!this.minimized)
                    setTimeout(() => {
                        console.log("SCROLLED");
                        var chatBox = document.getElementById(`chatBox-${this.chat_id}`);
                        chatBox.scrollTop = chatBox.scrollHeight - chatBox.clientHeight;
                    }, 50)

            },
            toggleChat() {
                this.minimized = !this.minimized;
            },
            closeChat() {
                // Remove chat id from store
                let activeChatsCopy = this.$parent.activeChats.slice();
                let index = activeChatsCopy.findIndex(chat => chat.id == this.chat_id);
                activeChatsCopy.splice(index, 1);
                this.$parent.activeChats = activeChatsCopy.slice();

                // Remove chat connected channel from store
                
                // let channel_index = this.globalChannels.indexOf('private-chat-' + this.chat_id);
                // let updatedChannels = this.globalChannels.slice();
                // updatedChannels.splice(channel_index, 1);
                // this.globalChannels = updatedChannels.slice();
            },
            sendMessage() {
                let urlMatch = this.newMessage.match(this.urlREGEX);
                let url = urlMatch ? urlMatch[0] : null;
                let media = null;
                let message = {
                    user_id: this.user.id,
                    friend_id: this.friend.id,
                    message: this.newMessage,
                    url,
                    media,
                    created_at: new Date(),
                };
                let that = this;
                //this.chatHeads[this.currentChatId].messages.push(message);
                // this.chatHeads[this.currentChatId].messages.splice(this.chatHeads[this.currentChatId].messages.length,
                    // 0, message)
                this.messages.push(message);
                axios.post('/chat/' + this.chat_id + '/message', message).then(response => {
                    console.log(response.data);
                });
                this.newMessage = '';
                this.scrollChat();
            },


            formatDates(date) {
                let result = "";
                result += (date.getHours() + 24) % 12 || 12;
                result += ":" + date.getMinutes();
                return result
            }
        }
    }

</script>


<style scoped>
    .chat {
        margin-top: auto;
        /* width: 300px; */
        position: fixed;
        bottom: 0;
        /* max-width: 300px !important; */
        padding-left: 0px;
    }

    .card {
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 0px;
        width: 300px;
        height: 400px;
        background: #005aa7;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #005aa7, #fffde4);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #005aa7, #fffde4);
    }

    .contacts_body {
        padding: 0.75rem 0 !important;
        overflow-y: auto;
        white-space: nowrap;
    }

    .msg_card_body {
        overflow-y: auto;
        padding-left: 0.5em;
        padding-right: 0.1em;
        padding-bottom: 0;
        background-color: rgb(0, 0, 0, 0.7);
    }

    .card-header {
        border-radius: 15px 15px 0 0 !important;
        border-bottom: 0 !important;
        padding: 0.25em 0em 0.1em 0em;
        background-color: rgba(0, 0, 0, 0.3) !important;
    }

    .card-footer {
        border-top: 0 !important;
        padding: 0 !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
    }

    .container {
        align-content: center;
    }

    .search {
        border-radius: 15px 0 0 15px !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
    }

    .search:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }
    .ph-row div {
        border-radius: 25px;
    }
    .type_msg {
        background-color: rgba(0, 0, 0, 0.6) !important;
        border: 0 !important;
        color: white !important;
        height: 40px !important;
        overflow-y: hidden;
        line-height: 2;
        overflow-y: scroll;
    }

    .type_msg:focus {
        box-shadow: none !important;
        outline: 0px !important;
    }

    .attach_btn {
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }

    .send_btn {
        background-color: rgba(0, 0, 0, 0.3) !important;
        color: white !important;
        cursor: pointer;
        border: 0 !important;
    }

    .search_btn {
        border-radius: 0 15px 15px 0 !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 0 !important;
        color: white !important;
        cursor: pointer;
    }

    .contacts {
        list-style: none;
        padding: 0;
    }

    .contacts li {
        width: 100% !important;
        padding: 5px 10px;
        margin-bottom: 15px !important;
    }

    .active {
        background-color: rgba(0, 0, 0, 0.3);
    }

    .user_img {
        height: 40px;
        width: 40px;

    }

    .user_img_msg {
        height: 30px;
        width: 30px;

    }

    .img_cont {
        position: relative;
        height: 40px;
        width: 40px;
    }

    .img_cont_msg {
        height: 30px;
        width: 30px;
    }

    .online_icon {
        position: absolute;
        height: 10px;
        width: 10px;
        background-color: #4cd137;
        border-radius: 50%;
        bottom: 0.2em;
        right: 0.1em;
        border: 1.5px solid white;
    }

    .offline {
        background-color: #c23616 !important;
    }

    .chat-minimized-icon {
        position: sticky;
        bottom: 5px;
        margin-top: 0.5em;
        /* margin-right: 10px; */
        cursor: pointer;
    }

    .user_info {
        margin-bottom: auto;
        margin-left: 15px;
    }

    .user_info span {
        font-size: 15px;
        font-weight: bold;
        color: white;
    }

    .user_info p {
        font-size: 10px;
        color: rgba(255, 255, 255, 0.6);
    }

    textarea::-webkit-input-placeholder {
        color: #bbb;
    }

    .type_msg::-webkit-scrollbar,
    .type_msg::-webkit-scrollbar-thumb {
        display: none;
    }

    .msg_card_body::-webkit-scrollbar-track {
        background-color: #444;
    }

    .msg_card_body::-webkit-scrollbar-thumb {
        background-color: #777;
    }

    .msg_cotainer {
        color: white;
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 5px;
        border-top-right-radius: 25px;
        border-bottom-right-radius: 25px;
        border-top-left-radius: 25px;
        background-color: #777979;
        padding: 7px;
        position: relative;
        max-width: 75%;
    }

    .msg_cotainer_send {
        color: white;
        margin-top: auto;
        margin-bottom: auto;
        margin-right: 10px;
        border-top-left-radius: 25px;
        border-bottom-left-radius: 25px;
        border-top-right-radius: 25px;
        padding: 7px;
        position: relative;
        max-width: 75%;
        background: #36D1DC;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #5B86E5, #36D1DC);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #5B86E5, #36D1DC);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }

    .msg_time {
        position: absolute;
        left: 0;
        bottom: -15px;
        color: rgba(255, 255, 255, 0.5);
        font-size: 10px;
    }

    .msg_time_send {
        position: absolute;
        right: 0;
        bottom: -15px;
        color: rgba(255, 255, 255, 0.5);
        font-size: 10px;
    }

    .msg_head {
        position: relative;
    }

    #action_menu_btn {
        position: absolute;
        right: 70px;
        top: 10px;
        color: white;
        cursor: pointer;
        font-size: 15px;
    }

    #action_exit_btn {
        position: absolute;
        right: 10px;
        top: 10px;
        color: white;
        cursor: pointer;
        font-size: 15px;
    }

    #action_minimize_btn {
        position: absolute;
        right: 40px;
        top: 10px;
        color: white;
        cursor: pointer;
        font-size: 15px;
    }

    .action_menu {
        z-index: 1;
        position: absolute;
        padding: 15px 0;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border-radius: 15px;
        top: 30px;
        right: 15px;
        display: none;
    }

    .action_menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .action_menu ul li {
        width: 100%;
        padding: 10px 15px;
        margin-bottom: 5px;
    }

    .action_menu ul li i {
        padding-right: 10px;

    }

    .action_menu ul li:hover {
        cursor: pointer;
        background-color: rgba(0, 0, 0, 0.2);
    }

    @media(max-width: 576px) {
        .contacts_card {
            margin-bottom: 15px !important;
        }
    }

    .dropdown-menu {
        transform: none !important;
        width: 50%;
        top: auto !important;
        right: 0;
        left: auto !important;
    }

    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu>.dropdown-menu {
        top: 0;
        left: -100%;
        margin-top: -6px;
        margin-left: -1px;
        -webkit-border-radius: 0 6px 6px 6px;
        -moz-border-radius: 0 6px 6px;
        border-radius: 0 6px 6px 6px;
    }

    .dropdown-submenu:hover>.dropdown-menu {
        display: block;
    }

    .dropdown-submenu>a:after {
        display: block;
        content: " ";
        float: right;
        width: 0;
        height: 0;
        border-color: transparent;
        border-style: solid;
        border-width: 5px 0 5px 5px;
        border-left-color: #ccc;
        margin-top: 5px;
        margin-right: -10px;
    }

    .dropdown-submenu:hover>a:after {
        border-left-color: #fff;
    }

    .dropdown-submenu.pull-left {
        float: none;
    }

    .dropdown-submenu.pull-left>.dropdown-menu {
        right: -100%;
        margin-left: 10px;
        -webkit-border-radius: 6px 0 6px 6px;
        -moz-border-radius: 6px 0 6px 6px;
        border-radius: 6px 0 6px 6px;
    }

    /* .card {
    width: 300px;
    border: none;
    border-radius: 15px;
    height: 400px;
}
.card .messages-container {
    overflow-y: scroll;
}
.adiv {
    background: #04CB28;
    border-radius: 15px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    font-size: 12px;
    height: 46px
}

.chat {
    border: none;
    background: #E2FFE8;
    font-size: 14;
    border-radius: 20px
}

.bg-white {
    border: 1px solid #E7E7E9;
    font-size: 14px;
    border-radius: 20px
}

.myvideo img {
    border-radius: 20px
}

.dot {
    font-weight: bold
}

.form-control {
    border-radius: 12px;
    border: 1px solid #F0F0F0;
    font-size: 14px
}

.form-control:focus {
    box-shadow: none
}

.form-control::placeholder {
    font-size: 14px;
    color: #C4C4C4
} */
    /* .message-input {
    height: ;
} */

</style>
