<template>
    <router-link :to="href" >
        <div class="user-list-item">
            <img :src="friend.avatar_full_path" alt="" class="rounded-circle user-avatar">
            <span class="">{{friend.name}}</span>
        </div>
    </router-link>
</template>

<script>
    export default {
        props: ['friend', 'href']
    }
</script>

<style>
    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #ddd;
    }

    ::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .user-avatar {
            height: 40px;
    width: 40px;
    border-radius: 50%;
    }
</style>