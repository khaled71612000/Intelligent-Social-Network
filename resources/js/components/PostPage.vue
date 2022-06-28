<template>
    <div class="container-fluid">
        <div class="row panel panel-white post panel-shadow">
            <div class="col-12">
                <div class="row post-heading">
                    <div class="col-2 user-img-width">
                        <a href="/user/1" class="nostyle">
                        <img src="https://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar"
                            alt="user profile image">
                        </a>
                        
                    </div>
                    <div class="col-8 col-sm-9">
                        <span class="row d-inline-flex">
                            <span class="col-12 post-header-details">
                                <span> <span class="username">Ryan Haywood</span> shared a post by <span
                                        class="username">Ahmed Hanafi</span>
                                </span>
                            </span>
                            <span class="col-12">
                                <p class="text-muted">1 minute ago</p>
                            </span>
                        </span>
                    </div>
                    <div class="col-1 ml-auto">
                        <span id="action_menu_btn" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></span>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">
                                <span><i class="fas fa-user"></i></span> Edit
                            </a>
                            <a class="dropdown-item" href="#">
                                <span><i class="fas fa-ban"></i></span> Delete
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-10">
                        <p>Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css
                            hmtl js framework. Codes for developers and web designers
                            Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css
                            hmtl js framework. Codes for developers and web designers
                            Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css
                            hmtl js framework. Codes for developers and web designers
                            Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css
                            hmtl js framework. Codes for developers and web designers
                            Bootdey is a gallery of free snippets resources templates and utilities for bootstrap css
                            hmtl js framework. Codes for developers and web designers
                        </p>
                    </div>
                </div>
                <div class="row stats text-center">
                    <div class="col-4">
                        <button @click='likePost' class="btn btn-block btn-default stat-item like-btn"><i
                                class="fa fa-thumbs-up icon"></i>2</button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-block btn-default stat-item comment-btn"><i
                                class="fa fa-comment-alt icon"></i>12</button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-block btn-default stat-item share-btn"><i
                                class="fa fa-share icon"></i>12</button>
                    </div>
                </div>

                <div class="row comment-section">

                    <ul class="comments-list" type='none'>
                        <li class="comment">
                            <div class="row post-heading">
                                <div class="col-2 user-img-width">
                                    <img src="https://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar"
                                        alt="user profile image">
                                </div>
                                <div class="col-5 col-sm-5">
                                    <span class="row d-inline-flex">
                                        <span class="col-12 post-header-details">
                                            <span class="username">Ryan Haywood</span>
                                        </span>
                                        <span class="col-12">
                                            <p class="text-muted">1 minute ago</p>
                                        </span>
                                    </span>
                                </div>
                                <div class="col-2 ml-auto">
                                    <span id="action_menu_btn" data-toggle="dropdown"><i
                                            class="fas fa-ellipsis-h"></i></span>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">
                                            <span><i class="far fa-flag"></i></span> Delete Comment
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <span><i class="fas fa-ban"></i></span> Block Ryan
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-10 comment-body-container">
                                    <p>Bootdey is a gallery of free snippets resources templates and utilities for
                                        bootstrap css
                                        hmtl js framework. Codes for developers and web designers
                                    </p>
                                </div>
                            </div>
                        </li>
                                              <li class="comment">
                            <div class="row post-heading">
                                <div class="col-2 user-img-width">
                                    <img src="https://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar"
                                        alt="user profile image">
                                </div>
                                <div class="col-5 col-sm-5">
                                    <span class="row d-inline-flex">
                                        <span class="col-12 post-header-details">
                                            <span class="username">Ryan Haywood</span>
                                        </span>
                                        <span class="col-12">
                                            <p class="text-muted">1 minute ago</p>
                                        </span>
                                    </span>
                                </div>
                                <div class="col-2 ml-auto">
                                    <span id="action_menu_btn" data-toggle="dropdown"><i
                                            class="fas fa-ellipsis-h"></i></span>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">
                                            <span><i class="far fa-flag"></i></span> Delete Comment
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <span><i class="fas fa-ban"></i></span> Block Ryan
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-10 comment-body-container">
                                    <p>Bootdey is a gallery of free snippets resources templates and utilities for
                                        bootstrap css
                                        hmtl js framework. Codes for developers and web designers
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                  <div class="row comment-input-section">
                    <div class="col-12">
                        <div class="input-group">
                            <input class="form-control" placeholder="Add a comment" type="text">
                            <span class="input-group-addon">
                                <a href="#"><i class="fa fa-edit"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                like: false
            }
        },
        computed: {
            liked() {
                return like
            }
        },
        methods: {
            likePost() {
                let likeBtn = event.target
                if(likeBtn.classList.contains('icon'))
                    likeBtn = likeBtn.parentElement;
                this.like = !this.like;
                this.like ? likeBtn.classList.add('liked') : likeBtn.classList.remove('liked')
            }
        }
    }

</script>

<style scoped>
    li {
        display: inline-block;
    }

    .row {
        height: inherit !important;
    }

    .info {
        color: inherit;
    }

    .info:hover {
        text-decoration: none !important;
    }

    .panel {
        background-color: white;
        border: 1px solid #ddd;
        margin-bottom: 1em;
    }

    .user-img-width {
        max-width: 60px;
    }

    .post-header-details {
        line-break: anywhere;
    }

    .panel-white .panel-heading {
        color: #333;
        background-color: #fff;
        border-color: #ddd;
        padding-left: 1em;
        padding-right: 1em;

    }

    .panel-white .panel-footer {
        background-color: #fff;
        border-color: #ddd;
    }

    .post .post-heading {
        height: 95px;
        padding-top: 20px;
    }

    .post .post-heading .avatar {
        width: 40px;
        height: 40px;
        display: inline;
    }

    .post .post-heading .meta .title {
        margin-bottom: 0;
    }

    .post .post-heading .meta .title a {
        color: black;
    }

    .post .post-heading .meta .title a:hover {
        color: #aaaaaa;
    }

    .post .post-heading .username {
        font-weight: 600;
    }

    .post .post-heading .meta .time {
        color: #999;
    }

    .post .post-image .image {
        width: 100%;
        height: auto;
    }

    .post-options {
        display: inline;
        float: right;
        cursor: pointer;
    }

    .post .post-description {
        padding: 15px;
    }

    .post .post-description p {
        font-size: 14px;
    }

    .stats {
        margin: 10px 5px;
        padding: 10px 0px;
        border-bottom: 1px solid #ddd;

    }

    .stats .stat-item {
        border: 1px solid #ddd;
        border-radius: 5px;
        /* margin: 0 5px; */
    }

    .stats .stat-item:focus {
        box-shadow: none;
    }


    .stats .stat-item .icon {
        margin-right: 8px;
        color: #656565;
    }

    .liked {
        background-color: #00adb5;
        color: white;
        box-shadow: 0 0 0 0.08rem #00adb5 !important;
    }

    .liked .icon {
        color: white !important;
    }

    .post .post-footer {
        padding: 15px;
    }

    .post .post-footer .input-group-addon a {
        color: #454545;
    }

    .post .post-footer .comments-list {
        padding: 0;
        margin-top: 20px;
        list-style-type: none;
    }

    .post .post-footer .comments-list .comment {
        display: block;
        width: 100%;
        margin: 20px 0;
    }

    .post .post-footer .comments-list .comment .avatar {
        width: 35px;
        height: 35px;
    }

    .post .post-footer .comments-list .comment .comment-heading {
        display: block;
        width: 100%;
    }

    .post .post-footer .comments-list .comment .comment-heading .user {
        font-size: 14px;
        font-weight: bold;
        display: inline;
        margin-top: 0;
        margin-right: 10px;
    }

    .post .post-footer .comments-list .comment .comment-heading .time {
        font-size: 12px;
        color: #aaa;
        margin-top: 0;
        display: inline;
    }

    .post .post-footer .comments-list .comment .comment-body {
        margin-left: 50px;
    }

    .post .post-footer .comments-list .comment>.comments-list {
        margin-left: 50px;
    }

    #action_menu_btn {
        cursor: pointer;
    }

    .dropdown-menu {
        left: auto;
        right: 0;
    }

    .comment-body-container {
          border-radius: 10px;
          background-color: aliceblue;
    }

    @media (max-width: 992px) {
        .post-header-details {
            width: 95%;
        }

    }

</style>
