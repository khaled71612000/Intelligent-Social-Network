<template>
    <div>
        <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-bell"></i> 
            <span v-if="is_new" class="indicator"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
            <li>
                <div class="notification-title"> Notification</div>
                <div class="notification-list">
                    <div class="list-group">
                        <div v-for="notification in notifications">
                        <PostLiked v-if='notification.type == "PostLiked"' :event='notification.data'></PostLiked>
                        <CommentCreated v-if='notification.type == "CommentCreated"' :event='notification.data'></CommentCreated>
                        <FriendRequestAccepted v-if='notification.type == "FriendRequestAccepted"' :event='notification.data'></FriendRequestAccepted>
                        <FriendEmotification v-if='notification.type == "FriendEmotification"' :event='notification.data'></FriendEmotification>
                        <UserAttributeChanged v-if='notification.type == "UserAttributeChanged"' :event='notification.data'></UserAttributeChanged>
                        <EmotificationGranted v-if='notification.type == "EmotificationGranted"' :event='notification.data'></EmotificationGranted>
                    </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="list-footer"> <a href="#">View all notifications</a></div>
            </li>
        </ul>
    </div>

</template>

<script>
import PostLiked from '../components/Notifications/PostLiked.vue';
    import CommentCreated from '../components/Notifications/CommentCreated.vue';
    import FriendRequestAccepted from '../components/Notifications/FriendRequestAccepted.vue';
    import FriendEmotification from '../components/Notifications/FriendEmotification.vue';
    import UserAttributeChanged from '../components/Notifications/UserAttributeChanged.vue';
    import EmotificationGranted from '../components/Notifications/EmotificationGranted.vue';

    export default {
        props: ['is_new', 'notifications'],
        created() {
            this.$store.dispatch('grabNotifications');
        },
        components:{
            PostLiked,
            FriendRequestAccepted,
            CommentCreated,
            FriendEmotification,
            UserAttributeChanged,
            EmotificationGranted,
        }
    }

</script>

<style scoped>
    button {
        float: right;
    }
    .notification-list {
    overflow-y: scroll;
    max-height: 70vh;
    }

</style>
