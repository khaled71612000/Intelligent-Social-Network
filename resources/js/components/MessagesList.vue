<template>
    <div>
        <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false"><i class="fas fa-comment-alt"></i> <span v-if='is_new' class="indicator"></span></a>
        <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
            <li>
                <div class="notification-title">Messages</div>
                <div class="notification-list">
                    <div class="list-group">
                        <a v-for="message in messages" :key="message.id" href="#"
                            :class="'list-group-item list-group-item-action' + (message.read ? '' : ' active') ">
                            <div class="notification-info">
                                <div class="notification-list-user-img"><img :src="message.user.avatar" alt=""
                                        class="user-avatar-md rounded-circle"></div>
                                <div class="notification-list-user-block">
                                    <div class="notification-list-user-name">{{ message.user.name }} <span v-if='!message.read'
                                            class="indicator"></span></div>
                                    <div class="message-item">{{ message.message }}
                                    </div>
                                    <div class="notification-date">{{ message.created_at }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
            <li>
                <div class="list-footer">
                    <router-link to="/chat">View all messages</router-link>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['is_new', 'messages']
    }

</script>

<style>

</style>
