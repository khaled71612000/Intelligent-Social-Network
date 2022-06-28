<template>
    <router-link :to="reactiveRedirectTo" class="list-group-item list-group-item-action"
        aria-expanded="false">
        <div class="notification-info">
            <div class="notification-list-user-img">
                <img :src='this.$store.state.user.avatar_full_path' class="user-avatar-md rounded-circle">
            </div>
            <div class="notification-list-user-block">
                <span class="notification-list-user-name">{{ this.$store.state.user.name }}</span>, your {{this.event.attribute_name}} changed from <span class="text-onism">{{this.event.attribute_old_value}}</span> to <span class="text-onism">{{this.event.attribute_new_value}}</span>
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
        data() {
            return {
                redirectTo:"",
            }
        },
        created() {
            console.log(this.event.attribute_new_value);
            switch(this.event.attribute_name) {
                case "learning_style":
                    this.redirectTo = "/insights/learning/" + this.event.attribute_new_value;
                    this.$store.dispatch("user/updateLearningStyle", this.event.attribute_new_value);

                    break;
                case "personality":
                    this.redirectTo = "/insights/personality/" + this.event.attribute_new_value;
                    this.$store.dispatch("user/updatePersonality", this.event.attribute_new_value);
                    break;
                case "emotions":
                    this.$store.dispatch("user/updateEmotions", this.event.attribute_new_value);
                    break;
            }
        },
        computed:{
            reactiveRedirectTo() {
                return this.redirectTo;
            }
        }
    }

</script>

<style>

</style>
