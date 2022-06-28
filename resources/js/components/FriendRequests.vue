<template>
    <div>
        <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false"><i class="fas fa-user-friends"></i>
            <!-- <span v-if='is_new' class="indicator"></span> -->
        </a>

        <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
            <li>
                <div class="notification-title">Friendship Requests</div>
                <div class="notification-list">
                    <div class="list-group">
                        <div v-for='request in FriendRequests'>
                            <FriendRequestSent :event='request'></FriendRequestSent>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="list-footer"> <a href="#">View all requests</a></div>
            </li>
        </ul>
    </div>


</template>

<script>
import FriendRequestSent from '../components/Notifications/FriendRequestSent.vue';

    export default {

        components: {
            FriendRequestSent
        },
        computed: {
            FriendRequests() {
                return this.$store.state.user.receivedRequests;
            }
        }

    }

</script>

<style scoped>
    button {
        float: right;
    }


</style>
