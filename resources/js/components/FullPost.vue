<template>
    <div class="fullPost">
        <input type="file" name="post-image" id="post-image" class="d-none">
        <div v-if='editMode'>
            <div class="post-form">
                <input type="text" class="form-control" placeholder="Post header" name="header" id="post-header" required v-model='ReactiveEditablePost.header'>
                <textarea rows="5" name="text" placeholder="Post body (optional)" class="form-control my-1" v-model='ReactiveEditablePost.body'></textarea>
                <img :src="ReactiveEditablePost.imageBase64 ? ReactiveEditablePost.imageBase64 : ReactiveEditablePost.image" id="img-upload" class="my-1">
                <button @click='uploadImage' v-if='!ReactiveEditablePost.image' class="btn btn-primary">Upload <i class="far fa-images"></i></button>
                <button @click='removeImage' v-if='ReactiveEditablePost.image' class="btn btn-danger">Remove Image <i class="far fa-images"></i></button>
                <button @click='submitEditedPost' class="btn btn-primary float-right" :disabled='ReactiveEditablePost.header.length == 0'>Post</button>
            </div>
        </div>
        <Post @toggleEditMode='toggleEditMode' v-else :post='Post' ></Post>
        <h4 class="mt-5">Comments</h4>
        <div class="row comment-section">
            <div class="col-12">
                <ul class="comments-list" type='none'>
                    <li class="comment" id="comment-container" v-for='(comment, index) in Post.comments'
                        :key='comment.id'>
                        <Comment :comment='comment' @deleteComment='deleteComment(index, comment.id)'></Comment>
                    </li>
                </ul>
            </div>

            <div class="col-12">
                <div class="input-group">
                    <input class="form-control" placeholder="Add a comment" type="text" v-model='new_comment'>
                    <span class="input-group-addon" @click='submitComment'>
                        <a href="#"><i class="fa fa-edit"></i></a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Post from './Post.vue';
    import Comment from './Comment';
    export default {
        props: ['post'],
        data() {
            return {
                new_comment: '',
                user: this.$store.state.user,
                edit: false,
                editablePost: {
                    header: this.post.header,
                    body: this.post.body,
                    image: this.post.image,
                    image64:null,
                    imageChanged: false,
                },
            }
        },
        mounted() {
            // this.editablePost.image = null; //this.checkImageExist();
        },
        computed: {
            Post(){
                return this.post;
            },
            editMode() {
                return this.edit;
            },
            ReactiveEditablePost() {
                return this.editablePost
            }
        },
        methods: {
            toggleEditMode() {
                this.edit = !this.edit;
                


            },
            uploadImage() {
                let post_img_input = document.getElementById('post-image');
                post_img_input.click();
                post_img_input.onchange = () => {
                    this.showImage(event.target);
                    this.editablePost.imageChanged = true;
                }
            },
            showImage(input) {
                let that = this;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        let imageBase64 = e.target.result
                        that.editablePost.image64 = imageBase64;
                        $('#img-upload').attr('src', imageBase64);

                    }
                    reader.readAsDataURL(input.files[0]);
                    that.editablePost.image = input.files[0]
                }
            },
            removeImage() {
                document.getElementById('img-upload').src = '';
                this.editablePost.image = null;
                this.editablePost.imageChanged = true;
            },
            submitEditedPost() {
                let currentPostImage = this.editablePost.image;
                if (currentPostImage) {
                    // New post contain image
                    if (this.editablePost.imageChanged) {
                        // New post image is different from old post image
                        console.log("Image changed, upload it to server");
                    }
                    // else {new post image == old post image}
        
                } else {
                    // New post doesn't contain image
                    if (this.editablePost.imageChanged) {
                        // Old post contained image
                        console.log("old image removed, now the post is image-less");
                    }
                    // else {neither old post nor new post contained images}

                }
                this.editablePost.imageChanged = false; // reset flag
                this.toggleEditMode();
                // post post
            },
            async submitComment() {
                // post request
                // Append temporary comment, send it to server, retrieve its full details asyncronously
                let that = this;
                let tempComment = {
                        id: 0,
                        user_id: this.user.id,
                        post_id: this.post.id,
                        body: that.new_comment,
                        upvotes_count: 0,
                        downvotes_count: 0,
                        created_at: new Date(),
                        user_current_vote: null,
                        user: this.user,
                }
                this.post.comments.push(tempComment);
                let indexOfTemp = this.post.comments.length - 1;
                let response = await this.$store.dispatch("user/createComment", {"post_id":that.post.id, "comment_body":that.new_comment});
                if(response == null) {
                    this.post.comments.splice(indexOfTemp, 1);
                    alert("Something went wrong!");
                    return;
                }
                this.post.comments[indexOfTemp] = response.data.comment;
                this.post.comments_count = response.data.comments_count;
                this.new_comment = '';
            },
            async deleteComment(index, id) {
                let deleted_comment = this.post.comments.splice(index, 1)[0];
                let newCommentsCount = await this.$store.dispatch("user/removeComment", id);
                if(newCommentsCount == null) {
                    // revert action
                    this.post.comments.splice(index, 0, deleted_comment);
                    console.log(deleted_comment);
                    alert("Something went wrong!");
                }
                else {
                    this.post.comments_count = newCommentsCount;
                }

            },



        },
        components: {
            Post,
            Comment
        }
    }

</script>

<style scoped>
    .comments-list {
        padding: 0;
        list-style-type: none;
        background-color: white;
        border: 1px solid #ddd;
        margin-bottom: 1em;
        padding-left: 0px;
        padding: 1em;
    }

    .comments-list .comment {
        display: block;
        width: 100%;
        margin: 20px 0;
        padding-bottom: 1em;
        border-bottom: 1px solid #ddd;
    }

    .comments-list .comment .avatar {
        width: 35px;
        height: 35px;
    }

    .comments-list .comment .comment-heading {
        display: block;
        width: 100%;
    }

    .comments-list .comment .comment-heading .user {
        font-size: 14px;
        font-weight: bold;
        display: inline;
        margin-top: 0;
        margin-right: 10px;
    }

    .comments-list .comment .comment-heading .time {
        font-size: 12px;
        color: #aaa;
        margin-top: 0;
        display: inline;
    }

    .comments-list .comment .comment-body {
        margin-left: 50px;
    }

    .comments-list .comment>.comments-list {
        margin-left: 50px;
    }

    #action_menu_btn {
        cursor: pointer;
    }

    .dropdown-menu {
        /* left: auto; */
        right: -300%;
    }

    .fullPost>>>.post-content img, #img-upload {
        width: 100% !important;
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

    .vote-item .upvote,
    .vote-item .downvote {
        cursor: pointer;
    }

</style>
