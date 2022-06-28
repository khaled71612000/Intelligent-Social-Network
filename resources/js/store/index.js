import Vuex from 'vuex';
import createPersistedState from "vuex-persistedstate";

import * as userForm from "../modules/userForm.js"
import * as user from "../modules/user.js"
import Axios from 'axios';

window.Vue = require('vue');
window.Vue.use(Vuex);

const getDefaultState = () => {
    return {
        api: {
            baseURL: "http://127.0.0.1:8000/",//"https://onism.azurewebsites.net/",
            prefix: "",
            endpoints: {
                "login": "login",
                "register": "register",
                "chat": "chat/" // chat_id
            }
        },
        token: null,
        socket_id:null,
        pusher: null,
        channels: [],
        activeChats: [],
        emotification:null,
        notifications_short_term:[],
        notifications_long_term: [],
    }
  }
  

export default new Vuex.Store({
    strict: process.env.NODE_ENV !== 'production',
    state: getDefaultState(),
    mutations: {
        SET_TOKEN(state, value) {
            state.token = value;
        },
        SET_PUSHER(state, value) {
            Vue.set(state, "pusher", value);
        },
        SET_SOCKET_ID(state, value) {
            state.socket_id = value;
        },
        ADD_CHANNEL(state, value) {
            if(Array.isArray(value))
                Vue.set(state, "channels", value);
            else
                state.channels.push(value);
        },
        SET_ACTIVE_CHATS(state, value) {
            Vue.set(state, "activeChats", value);
        },
        SET_CHAT_MINIMIZED(state, data) {
            let index = state.activeChats.findIndex(chat => chat.id == data.chat_id)
            state.activeChats[index].isMinimized = data.isMinimized
        },
        ADD_NOTIFICATION(state, value){
            state.notifications_short_term.push(value);
            state.notifications_long_term.unshift(value);
        },
        SET_LONGTERM_NOTIFICATIONS(state, value) {
            Vue.set(state, "notifications_long_term", value);
        },
        REMOVE_NOTIFICATION(state, index) {
            let updatedNotifications = state.notifications_short_term.slice();
            updatedNotifications.splice(index, 1);
            Vue.set(state, "notifications_short_term", updatedNotifications.slice());

        },
        CLEAR_SHORTTERM_NOTIFICATIONS(state, value){ 
            state.notifications_short_term = [];
        },
        SET_EMOTIFICATION(state, value) {
            state.emotification = value;
        },
        CLOSE_EMOTIFICATION(state, value) {
            state.emotification = null;
        },
        resetState(state) {
            // Merge rather than replace so we don't lose observers
            // Run on registeration form submission
            console.log("ALL CLEARED")
            Object.assign(state, getDefaultState());
        },
    },
    actions: {
        grabNotifications({state, commit}) {
            if(state.user.id) {
                console.log("Hello " + state.user.name)
                axios.get(`/api/user/${state.user.id}/notifications`).then(response => {
                    console.log(response.data.notifications);
                    let notifications = response.data.notifications.map(notification => {
                        return {
                            "type": notification.type.substring(notification.type.lastIndexOf('\\')+1),
                            "data": notification.data
                        }
                    });
                    commit("SET_LONGTERM_NOTIFICATIONS", notifications);
                    
                });
            }
        }
    },
    getters: {
        getToken: state => {
            return state.token
        },
        getSocketId: state => {
            return state.socket_id
        },
        getPusher: state => {
            return state.pusher
        }
    },
    modules: {
        userForm,
        user
    },
    plugins: [createPersistedState({
        storage: window.sessionStorage,
    })],
})
