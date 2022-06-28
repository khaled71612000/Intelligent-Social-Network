import Vue from "vue";

export const namespaced = true;

const getDefaultState = () => {
    return {
        id: null,
        name: null,
        email: null,
        cover: null,
        phone_number: null,
        avatar_full_path: null,
        avatar: null,
        bio:null,
        nickname: null,
        country: null,
        personality: null,
        learning_style: null,
        age: null,
        exp: null,
        dob: null,
        friends: null,
        followed_communities:null,
        chats: null,
        blockedUsers: null,
        blockedBy: null,
        receivedRequests: null,
        sentRequests: null,
        emotifiables: null,
        emotifiers: null,
        privacy: null,
        emotions: null,
        hobbies: null,
        communities:null,
        followers:null,
        posts:null,
        
    }
}

export const notificationTypes = [
    "CommentCreated",
    // "Emotification",
    "FriendEmotification",
    "FriendRequestSent",
    "FriendRequestAccepted",
    "SystemNotification",
    "PostLiked",
    "UserAttributeChanged",
    "EmotificationGranted",
]

export const state = getDefaultState()

export const mutations = {
    SET_USER(state, values) {
        Object.assign(state, values);
        let userImagesPath = "/storage/files/user/";
        let profilePicPath = userImagesPath + "profile/";
        let coverPath = userImagesPath + "cover/";

        profilePicPath += state.avatar ?? "default.jpg";
        state.avatar = profilePicPath;

        coverPath += state.cover ?? "default.png";
        state.cover = coverPath;
    },
    SET_NAME(state, value) {
        state.name = value;
    },
    SET_NICKNAME(state, value) {
        state.nickname = value;
    },
    SET_PHONE_NUMBER(state, value) {
        state.phone_number = value;
    },
    SET_AVATAR(state, value) {
        state.avatar = value;
    },
    SET_NICKNAME(state, value) {
        state.nickname = value;
    },
    SET_COUNTRY(state, value) {
        state.name = value;
    },
    SET_PERSONALITY(state, value) {
        state.personality = value;
    },
    SET_AGE(state, value) {
        state.age = value;
    },
    SET_LEARNING_STYLE(state, value) {
        state.learning_style = value
    },
    // SET_SENT_REQUESTS(state, value) {
    //     Vue.set(state, "sentRequests", value)
    // },
    // SET_RECEIVED_REQUESTS(state, value) {
    //     Vue.set(state, "receivedRequests", value)
    // },
    ADD_RECEIVED_REQUEST(state, new_request) {
        let alreadyAdded = state.receivedRequests.findIndex(request => request.user.id == new_request.user.id) != -1;
        if(!alreadyAdded)
            state.receivedRequests.push(new_request);
    },
    ADD_SENT_REQUEST(state, new_request) {
        let alreadyAdded = state.sentRequests.findIndex(request => request.user.id == new_request.user.id) != -1;
        if(!alreadyAdded)
            state.sentRequests.push(new_request);
        
    },
    SET_N_FRIENDS(state, value) {
        state.n_friends = value;
    },
    ADD_NEW_FRIEND(state, value) {
        let alreadyAdded = state.friends.findIndex(friend => friend.id == value.id) != -1;
        if(!alreadyAdded)
            state.friends.push(value);
    },
    ADD_CHAT(state, new_chat) {
        let alreadyAdded = state.chats.findIndex(chat => chat.id == new_chat.id) != -1;
        if(!alreadyAdded)
            state.chats.push(new_chat);
    },
    REMOVE_CHAT(state, friend_id) {
        state.chats = state.chats.filter(chat=>{
            chat.friend_id != friend_id
        });
    },
    REMOVE_FRIEND(state, friend_id) {
        state.friends = state.friends.filter(friend => {
            return friend.id != friend_id;
        })
    },
    REMOVE_RECEIVED_REQUEST(state, request_user_id) {
        state.receivedRequests = state.receivedRequests.filter(request => {
            request.user.id != request_user_id
        });
    },

    REMOVE_SENT_REQUEST(state, request_user_id) {
        state.sentRequests = state.sentRequests.filter(request => {
            request.user.id != request_user_id
        });
    },

    SET_EXP(state, value) {
        state.exp = value;
    },
    SET_DOB(state, value) {
        state.dob = value;
    },
    SET_FRIENDS(state, value) {
        Vue.set(state, "friends", value);
    },
    SET_CHATS(state, value) {
        Vue.set(state, "chats", value);
    },
    SET_BLOCKED(state, value) {
        Vue.set(state, "blocked_users", value)
    },
    SET_PRIVACY(state, value) {
        Vue.set(state, "privacy", value)
    },
    SET_EMOTIONS(state, value) {
        state.emotions = value;
    },
    SET_HOBBIES(state, value) {
        Vue.set(state, "hobbies", value)
    },

    SET_COMMUNITIES(state, value) {
        Vue.set(state, "communities", value)
    },
    SET_POSTS(state, value) {
        Vue.set(state, "posts", value)
    },
    SET_FOLLOWERS(state, value) {
        Vue.set(state, "followers", value)
    },
    SET_FOLLOWED_COMMUNITIES(state, value) {
        Vue.set(state, "followed_communities", value);
    },
    ADD_FOLLOWED_COMMUNITY(state, community) {
        state.followed_communities.push(community);
    },
    REMOVE_FOLLOWED_COMMUNITY(state, community_id) {
        state.followed_communities = state.followed_communities.filter(community => {
            community.id != community_id
        });
    },
    ADD_EMOTIFIABLE(state, friend_id) {
        if(!state.emotifiables.includes(friend_id))
            state.emotifiables.push(friend_id);
    },
    REMOVE_EMOTIFIABLE(state, friend_id){ 
        let index = state.emotifiables.indexOf(friend_id);
        if(index != -1)
            state.emotifiables.splice(index, 1);
    },
    resetState(state) {
        // Merge rather than replace so we don't lose observers
        // Run on registeration form submission
        console.log("USER CLEARED");
        Object.assign(state, getDefaultState());
    }
}

export const actions = {
    connectPusher({commit, rootState}, user_id) {
        
    let notification_keep_for_seconds = 10 * 1000;
    // Initialize pusher & connect to private channel for notifications to this.user
    let pusher = new Pusher('550e330b9283050b4c09', {
        cluster: 'mt1',
        authEndpoint: rootState.api.baseURL + 'broadcasting/auth',
        auth: {
            headers: {
                "Authorization": `Bearer ` + rootState.token
            }
        }
    })
    
    pusher.connection.bind("connected", function () {
        window.axios.defaults.headers.common['X-Socket-ID'] = pusher.connection.socket_id;
        commit("SET_SOCKET_ID", pusher.connection.socket_id, {root:true});
        console.log("PUSHER CONNECTED!!!!!!!!!");
      });

    let notifications_channel = 'private-notification-' + user_id;
    let ntfChannel = pusher.subscribe(notifications_channel);
    
    ntfChannel.bind("Emotification", response => {
        commit("SET_EMOTIFICATION", response, {root:true});
    });

    notificationTypes.forEach(notificationType => {
        ntfChannel.bind(notificationType, response => {
            
            let notification = {
                "type": notificationType,
                "data": response,
            };
            console.log(notification);
            commit("ADD_NOTIFICATION", notification, {root:true});
            let index = rootState.notifications_short_term.length - 1;
            setTimeout(() => {
                commit("REMOVE_NOTIFICATION", index, {root:true})
                console.log("REMOVED");
            }, notification_keep_for_seconds)
            console.log(notification);
        })
    });
    window.Pusher = pusher;
    
    // commit("SET_PUSHER", pusher, {root:true});
    // localStorage.setItem("onismpusher", JSON.stringify(pusher));
    commit("ADD_CHANNEL", notifications_channel, {root:true})
    },

    async login({commit, rootState, dispatch}, [data]) {
        // API Request to login
        let response = await axios.post(rootState.api.endpoints.login, JSON.stringify(data), {
            headers: {
                "Content-Type": "application/json"
            }
        })
        .then(response => {
            // If token_type is part of the response, then it's success
            if (response.data.token_type) {
                // Set user data (in this module) & token (in root)
                commit("SET_USER", response.data.user);
                commit("SET_TOKEN", response.data.token, {root:true});
                window.axios.defaults.headers.common['Authorization'] = `Bearer ` + rootState.token;
                

                // this.connectPusher(null, response.data.user.id)

                dispatch('connectPusher', response.data.user.id);
                
                // return response for 'Login' component
                return {
                    authenticated:true
                };
            }
            else {
                console.log(response)
                return {
                    authenticated:false,
                    response
                }
            }
        })
        .catch(error=>{
            if(error.response)
                return error.response.data;
            return {"error": error.message}
        })
        return response;
    },
    logout({commit}) {
        commit("resetState");
        commit("userForm/resetState", null, {root:true});
        commit("resetState", null, {root:true});
    },

    sendFriendRequest({commit}, user) {
        axios.get(`/relationships/addFriend/${user.id}`).then(response=> {
            if(response.data.state) {
                let newRequest = {
                    "created_at": new Date(),
                    "user":user,
                };
                commit("ADD_SENT_REQUEST", newRequest);
            }
            else {
                console.log("Couldn't sent request");
            }
        })
    },

    receiveRequest({commit}, request) {
        commit("ADD_RECEIVED_REQUEST", request);
    },

    acceptFriend({commit}, friend_id) {
        axios.get(`/relationships/acceptFriend/${friend_id}`).then(response=> {
            if(response.data.state) {
                commit("ADD_NEW_FRIEND", response.data.friend);
                commit("ADD_CHAT", response.data.chat);
                commit("REMOVE_RECEIVED_REQUEST", response.data.friend.id);
            }
            else {
                console.log("Couldn't accept request");
            }
        })
    },

    cancelFriendRequest({commit}, user_id) {
        axios.get(`/relationships/cancelFriendRequest/${user_id}`).then(response => {
            if(response.data.state) {
                commit("REMOVE_SENT_REQUEST", user_id);
            }
        })
    },
    removeFriend({commit}, friend_id) {
        axios.get(`/relationships/unfriend/${friend_id}`).then(response => {
            if(response.data.state) {
                commit("REMOVE_FRIEND", friend_id);
                commit("REMOVE_CHAT", friend_id);
            }
        })
    },

    grantEmotification({commit}, friend_id) {
        axios.get(`/relationships/emotify/${friend_id}`).then(response => {
            if(response.data.state) {
                commit("ADD_EMOTIFIABLE", friend_id);
            }
        })
    },


    takeOffEmotification({commit}, friend_id) {
        axios.get(`/relationships/unemotify/${friend_id}`).then(response => {
            if(response.data.state) {
                commit("REMOVE_EMOTIFIABLE", friend_id);
            }
        })
    },

    followCommunity({commit}, community_id) {
        return axios.get(`/api/community/${community_id}/follow`).then(response => {
            if(response.data.state) {
                commit("ADD_FOLLOWED_COMMUNITY", response.data.community);
                return response.data.followers
            }
        })
    },

    unfollowCommunity({commit}, community_id) {
        return axios.get(`/api/community/${community_id}/unfollow`).then(response => {
            if(response.data.state) {
                commit("REMOVE_FOLLOWED_COMMUNITY", community_id);
                return response.data.followers;
            }
        })
    },

    upvoteComment({}, comment_id) {
        return axios.get(`/api/comment/${comment_id}/upvote`).then(response => {
            if(response.data.state) {
                let data = {
                    "upvotes_count":response.data.upvotes_count,
                    "downvotes_count":response.data.downvotes_count,
                    "current_user_vote":response.data.current_user_vote,
                };
                return data;
            }
            return null;
        }).catch(()=> {
            return null;
        })
    },

    downvoteComment({} ,comment_id) {
        return axios.get(`/api/comment/${comment_id}/downvote`).then(response => {
            if(response.data.state) {
                let data = {
                    "upvotes_count":response.data.upvotes_count,
                    "downvotes_count":response.data.downvotes_count,
                    "current_user_vote":response.data.current_user_vote,
                };
                return data;
            }
            return null;
        }).catch(()=>{ 
            return null
        })
    },

    createComment({}, payload) {
        let data = {
            "body": payload.comment_body
        };
        return axios.post(`/api/post/${payload.post_id}/comment`, data).then(response => {
            if(response.data.state) {
                return response;
            }
            return null;
        }).catch(() => {
            return null;
        })
    },

    async removeComment({}, comment_id) {

        return axios.post(`/api/comment/${comment_id}/delete`, null).then(response => {
            if(response.data.state) {
                return response.data.comments_count;
            }
            return null;
        }).catch(() => {
            return null;
        })
    },

    updatePersonality({commit}, newPersonality){
        commit("SET_PERSONALITY", newPersonality);
    },
    updateLearningStyle({commit}, newLearningStyle) {
        commit("SET_LEARNING_STYLE", newLearningStyle);
    },
    updateEmotions({commit}, newEmotion) {
        commit("SET_EMOTIONS",  newEmotion)
    },

 
    
}

export const getters = {
    getUser: state => {
        return state;
      },

}
