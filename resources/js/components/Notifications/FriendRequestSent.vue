<template>

            <a href="#" class="list-group-item list-group-item-action"
                style="line-height:15px;">
                <div class="notification-info">
                    <router-link :to="`/profile/${this.event.user.id}`" class="notification-list-user-img"><img :src="this.event.user.avatar_full_path" alt=""
                            class="user-avatar-md rounded-circle"></router-link>
                    <div class="notification-list-user-block " style="line-height:15px;"><router-link :to="`/profile/${this.event.user.id}`"
                            class="notification-list-user-name">{{ this.event.user.name }}</router-link>
                        <button  class="btn btn-danger btn-sm mx-1" style="float:right">Decline</button>
                        <button @click="acceptFriend" class="btn btn-primary btn-sm mx-1" style="float:right">Accept</button>
                        <div class="notification-date">Now</div>
                    </div>
                </div>
            </a>

</template>

<script>
    export default {
        props:['event'],
        created() {
            this.$store.dispatch("user/receiveRequest", this.event);
        },
        methods:{
            acceptFriend() {
                this.$store.dispatch("user/acceptFriend", this.event.user.id);
            }
        }
    }

</script>

<style>

</style>
