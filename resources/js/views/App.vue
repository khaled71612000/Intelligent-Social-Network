<template>
    <div>
        <div class="row justify-content-center fixed-nav">
            <div class="col-12">
                <NavBar v-if='token'></NavBar>
                <Emotification v-if='emotification' :event="emotification"></Emotification>
                <div class="notifications-container">
                    <div v-for="notification in notifications_short_term" class="short-term-notification">
                        <PostLiked v-if='notification.type == "PostLiked"' :event='notification.data'></PostLiked>
                        <CommentCreated v-if='notification.type == "CommentCreated"' :event='notification.data'></CommentCreated>
                        <FriendRequestAccepted v-if='notification.type == "FriendRequestAccepted"' :event='notification.data'></FriendRequestAccepted>
                        <FriendRequestSent v-if='notification.type == "FriendRequestSent"' :event='notification.data'></FriendRequestSent>
                        <FriendEmotification v-if='notification.type == "FriendEmotification"' :event='notification.data'></FriendEmotification>
                        <UserAttributeChanged v-if='notification.type == "UserAttributeChanged"' :event='notification.data'></UserAttributeChanged>
                        <EmotificationGranted v-if='notification.type == "EmotificationGranted"' :event='notification.data'></EmotificationGranted>
                    </div>
                </div>
                
            </div>

        </div>
        <router-view></router-view>
        
    </div>


</template>

<script>
import PostLiked from '../components/Notifications/PostLiked.vue';
import CommentCreated from '../components/Notifications/CommentCreated.vue';
import FriendRequestAccepted from '../components/Notifications/FriendRequestAccepted.vue';
import FriendRequestSent from '../components/Notifications/FriendRequestSent.vue';
import FriendEmotification from '../components/Notifications/FriendEmotification.vue';
import UserAttributeChanged from '../components/Notifications/UserAttributeChanged.vue';
import Emotification from '../components/Emotification.vue';
import EmotificationGranted from '../components/Notifications/EmotificationGranted.vue';

    import {
        mapState
    } from 'vuex';
    export default {

        created() {
            // Reload data
            let that = this;
            if (this.user.id) {
                this.$store.dispatch('user/connectPusher', that.user.id, {
                        root: true
                    });
                this.$store.commit("CLEAR_SHORTTERM_NOTIFICATIONS");
            }
        },
        mounted() {
            $('.modal').modal('show');
        },
        components: {
            PostLiked,
            FriendRequestAccepted,
            FriendRequestSent,
            CommentCreated,
            FriendEmotification,
            Emotification,
            UserAttributeChanged,
            EmotificationGranted,
        },
        computed: {
            ...mapState(['user', 'token', 'notifications_short_term', 'emotification']),


        },
        methods: {

        }
    }

</script>

<style>
    @import "../../css/placeholder-loading.css";
 
    body,
    html {
        font-family: 'Roboto', sans-serif;
        overflow-x: hidden;
        z-index: 999;
        padding: 0;
        margin: 0;
        height: 100%;
        position: relative;
    }

    .row-noheight {
        height: inherit !important;
    }

    a.nostyle:link,
    a.nostyle {
        text-decoration: inherit;
        color: inherit;
        cursor: pointer;
    }

    .input-w-50 {
        width: 50%;
    }

    .input-w-75 {
        width: 75%;
    }

    a.nostyle:visited {
        text-decoration: inherit;
        color: inherit;
    }

    .toggler {
        cursor: pointer;
    }

    .bg-onism-hover:hover {
        background-color: #00adb5;
        color: white;
    }

    .btn-primary {
        background-color: #00adb5 !important;
    }

    .btn-outline-primary {
        color: #00adb5 !important;
        border-color: #00adb5 !important;
    }

    .btn-outline-primary:hover {
        color: white !important;
        border-color: #00adb5 !important;
        background-color: #00adb5 !important;
    }

    .btn-onism {
        color: #00adb5;
        border-color: #00adb5;
    }

    .badge-onism {
        background-color: #00adb5 !important;
        color: white !important;
    }

    input:focus,
    .btn:focus {
        box-shadow: 0 0 0 0.2rem rgb(0 173 181 / 25%) !important;
    }

    .dropdown-item:hover {
        background-color: rgb(0 173 181 / 25%)
    }

    .text-onism {
        color: #00adb5 !important;
    }

    .bg-onism {
        background-color: #00adb5 !important;
    }

    .fixed-nav {
        position: sticky;
        top: 0;
        z-index: 99999;
    }


    .notifications-container {
        position: fixed;
        width: 350px;
        bottom: 10px;
        left: 10px;
    }
    .short-term-notification {
        margin: 10px auto;
        
    }

</style>
