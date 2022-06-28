<template>
    <router-link :to="`/profile/${this.event.friend.id}`" class="list-group-item list-group-item-action"
        aria-expanded="false">
        <div class="notification-info">
            <div class="notification-list-user-img">
                <img :src='this.event.friend.avatar_full_path' class="user-avatar-md rounded-circle">
            </div>
            <div class="notification-list-user-block">
                <span class="notification-list-user-name">{{ this.event.friend.name }}</span> has granted you <span class="text-onism">Emotifications</span>!
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
