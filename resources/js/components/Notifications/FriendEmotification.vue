<template>
    <router-link :to="`/profile/${this.event.user.id}`" class="list-group-item list-group-item-action"
        aria-expanded="false">
        <div class="notification-info">
            <div class="notification-list-user-img">
                <img :src='this.event.user.avatar_full_path' class="user-avatar-md rounded-circle">
            </div>
            <div class="notification-list-user-block">
                <span class="notification-list-user-name">{{ this.event.user.name }}</span>{{this.event.emotifiable_message}}
                <div class="notification-date">
                    Now
                </div>
            </div>
        </div>
    </router-link>
</template>

<script>
    export default {
        props: ['event'],
    }

</script>

<style>

</style>
