<template>
    <router-link :to="`/profile/${this.event.friend.id}`" class="list-group-item list-group-item-action"
        aria-expanded="false">
        <div class="notification-info">
            <div class="notification-list-user-img">
                <img :src='this.event.friend.avatar_full_path' class="user-avatar-md rounded-circle">
            </div>
            <div class="notification-list-user-block">
                <span class="notification-list-user-name">{{ this.event.friend.name }}</span> accepted your friendship request. 
                <router-link :to='`/insights/personality/${this.event.friend.personality}`'>
                View Personality
                </router-link>
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
        created() {
            // Add friend to user.friends
            this.$store.commit("user/ADD_NEW_FRIEND", this.event.friend);
            this.$store.commit("user/REMOVE_SENT_REQUEST", this.event.friend.id)

        }
    }

</script>

<style>

</style>
