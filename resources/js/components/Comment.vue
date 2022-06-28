<template>
    <div>
        <div class="row post-heading">
            <div class="col-1 user-img-width">
                <img :src="comment.user.avatar_full_path" class="img-circle avatar" alt="user profile image">
            </div>
            <div class="col-5 col-sm-5">
                <span class="row d-inline-flex">
                    <span class="col-12 post-header-details">
                        <a :href="`/users/${comment.user.id}`" class="nostyle username">{{comment.user.name}}</a>
                    </span>
                    <span class="col-12">
                        <p class="text-muted">{{dateProcessor.sinceWhen(new Date(comment.created_at))}}</p>
                    </span>
                </span>
            </div>
            <div class="col-2 ml-auto text-center">
                <span id="action_menu_btn" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></span>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a @click='toggleEditMode' class="dropdown-item" v-if='user.id == comment.user.id'>
                        <span><i class="fas fa-edit"></i></span> Edit Comment
                    </a>
                    <a @click='deleteComment(index)' class="dropdown-item" href="#" v-if='user.id == comment.user.id'>
                        <span><i class="fas fa-trash-alt"></i></span> Delete Comment
                    </a>
                    <a class="dropdown-item" v-if='user.id != comment.user.id'>
                        <span><i class="far fa-flag"></i></span> Report {{comment.user.name.replace(/ .*/,'')}}
                    </a>
                    <a class="dropdown-item" v-if='user.id != comment.user.id'>
                        <span><i class="fas fa-ban"></i></span> Block {{comment.user.name.replace(/ .*/,'')}}
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10 comment-body-container">
                <textarea v-if='editMode' class="form-control" type="text" v-model='commentBody'></textarea>
                <a v-if='editMode' class="input-group-addon nostyle float-right" @click='submitComment'>
                    <i class="fa fa-edit text-onism"></i>
                </a>
                <p v-else>
                    {{commentBody}}
                </p>
                <span class="vote-item">
                    <a :class="'upvote nostyle' + (userVote === true ? ' text-onism text-bold' : '')" @click='upvote'>
                        <i class="icon fas fa-arrow-up"></i>
                    </a>
                    {{upvotes}}
                </span>
                <span class="vote-item">
                    <a :class="'downvote nostyle' + (userVote === false ? ' text-onism text-bold' : '')" @click='downvote'>
                        <i class="icon fas fa-arrow-down"></i>
                    </a>
                    {{downvotes}}
                </span>

            </div>
        </div>
    </div>
</template>

<script>
import DateProcessor from '../services/Date.js';
    export default {
        props: ['comment', 'index'],
        data() {
            return {
                user: this.$store.state.user,
                edit:false,
                dateProcessor: new DateProcessor(),
            }
        },

        computed: {
            commentBody: {
                get() {
                    return this.comment.body;
                },
                set(value) {
                    this.comment.body = value;
                }
            },
            editMode() {
                return this.edit;
            },
            upvotes() {
                return this.comment.upvotes_count;
            },
            downvotes() {
                return this.comment.downvotes_count;
            },
            userVote() {
                return this.comment.current_user_vote;
            }
        },
        methods: {
            async upvote() {
                if(this.comment.activeUserVote === false) {
                    this.comment.downvotes_count--;
                }
                if(this.comment.activeUserVote === true){
                    this.comment.upvotes_count--;
                    this.comment.activeUserVote = null;
                }
                else{
                    this.comment.upvotes_count++;
                    this.comment.activeUserVote = true;
                }
                let response = await this.$store.dispatch('user/upvoteComment', this.comment.id);
                console.log(response);
                if(response == null) {
                    alert("Something went wrong!");
                    return;
                }
                this.comment.upvotes_count = response.upvotes_count;
                this.comment.downvotes_count = response.downvotes_count;
                this.comment.current_user_vote = response.current_user_vote;

            },
            async downvote() {
                if(this.comment.activeUserVote === true) {
                    this.comment.upvotes_count--;
                }
                if(this.comment.activeUserVote === false) {
                    this.comment.downvotes_count--;
                    this.comment.activeUserVote = null;
                }
                else {
                    this.comment.downvotes_count++;
                    this.comment.activeUserVote = false;
                }
                let response = await this.$store.dispatch('user/downvoteComment', this.comment.id);
                if(response == null) {
                    alert("Something went wrong!");
                    return;
                }
                this.comment.upvotes_count = response.upvotes_count;
                this.comment.downvotes_count = response.downvotes_count;
                this.comment.current_user_vote = response.current_user_vote;
            },
            toggleEditMode() {
                this.edit = !this.edit;
            },
            submitComment() {
                this.comment.body = this.commentBody;
                this.toggleEditMode();
            },
            deleteComment(index) {
                this.$emit('deleteComment', index);
            }
        }
    }

</script>

<style scoped>
     .username {
        font-weight: 600;
        cursor: pointer;
    }
    #action_menu_btn {
        cursor: pointer;
    }

/* 
    .comment-body-container {
          border-radius: 10px;
          background-color: aliceblue;
    } */

    .vote-item {
        color: grey;
        margin-right: 1em;
    }
    .vote-item .upvote, .vote-item .downvote {
        cursor: pointer;
    }


</style>
