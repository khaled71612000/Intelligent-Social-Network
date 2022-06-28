<template>
    <div class="card m-3">
        <img :src="require(`../assets/images/${img}`)" class="card-img-top">
        <div class="card-body d-flex flex-column">
            <h4 class="card-title">{{ title }}</h4>
            <p class="card-text">{{ description }}</p>
            <div class="btn-group">
                <router-link v-if="self_related" :to="path + user[`${attribute}`]" class="btn btn-outline-primary mx-1 px-4">Me</router-link>
                <a class="btn btn-outline-info mx-1 dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Friend
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <UserItemList v-for="friend in friends_list" v-bind:key="friend.id" :href="path + friend[`${attribute}`]" :friend="friend" class="dropdown-item"></UserItemList>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import UserItemList from './UserListItem.vue';
    export default {
        name: 'ProfileCard',
        props: ['title', 'img', 'description', 'attribute', 'self_related', 'path', 'user', 'friends_list'],
        components: {
            UserItemList
        }
    }
</script>

<style scoped>
    .card {
        box-shadow: 0px 10px 10px #999;
        border: 0px solid inherit;
        border-radius: 10px;
        /* width: 75%; */
    }


    /* .card-body:hover {
    cursor: pointer;
} */


    .card-title {
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 600;
        font-size: 18px;
        text-align: center;
        line-height: 1.1em;
    }

    .btn-custom {
        display: inline-block;
    }

    .dropdown-menu {
        width: 100%;
        overflow-y: scroll;
        max-height: 50vh;
        
    }

</style>