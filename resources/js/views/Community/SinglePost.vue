<template>
    
    <div class="col-12 col-sm-10 col-md-7 col-lg-6 order-1 order-md-0 posts-container" v-if="current_single_post">
        <div class="mt-2 posts-list">
            <FullPost :post='current_single_post'></FullPost>
        </div>
    </div>

</template>

<script>
import FullPost from '../../components/FullPost.vue';
    export default {
        name:"SinglePost",
        data() {
            return {
                
            }
        },
        components: {
            FullPost
        },
        computed: {
            current_single_post() {
                return this.$parent.single_post;
            }
        }
        
    }

</script>

<style scoped>

        .card {
        border: none;
        background-color: white;
    }

    @media (max-width: 768px) {

        .posts-container {
        margin-top: 2em;
        }

    }

    @media (max-width: 576px) {
        .card {
            margin-top: 20px;
        }


    }
</style>
