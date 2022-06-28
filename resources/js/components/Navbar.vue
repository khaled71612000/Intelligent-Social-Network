<template>
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-md navbar-light bg-white sticky-top">

            <router-link to="/" class="navbar-brand navbar-logo d-flex align-items-center">
                <img height="40" class="logo-onism" src="/images/1.png" alt="">
            </router-link>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto navbar-left-top">
                    <li class="nav-item my-auto">
                        <div id="custom-search"> 
                            <input class="form-control" type="text" placeholder="Search..">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto navbar-right-top">
                    <!-- style="filter: invert(1);" -->
                    <li class="nav-item dropdown notification my-auto">
                    <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="fas fa-solar-panel"></i> Dashboard <i class="fas fa-caret-down"></i>
                    </a>

                    <div class="sidebar-container dropdown-menu dropdown-menu-right notification-dropdown mx-auto">
                    <div class="sidebar-logo">
                        <router-link  class="nostyle" :to="`/profile/${user.id}`" aria-expanded="false">
                            {{user.name}}
                        </router-link>
                    </div>
                        <ul class="sidebar-navigation">
                            <li class="header">Insights</li>
                            <li>
                                <router-link class="capitalized" to="#" aria-expanded="false" title="Current Mode">
                                        <i class="fas fa-heartbeat"></i> {{user.emotions}}
                                </router-link>
                            </li>
                            <li>
                                <router-link title="Personality Type" :to="`/insights/personality/${user.personality}`" aria-expanded="false">
                                        <i class="fas fa-user"></i> {{user.personality}}
                                </router-link>
                            </li>
                            <li>
                                <router-link class='capitalized' title="Learning Style" :to="`/insights/learning/${user.learning_style}`" aria-expanded="false">
                                        <i class="fas fa-brain"></i> {{user.learning_style}}
                                </router-link>
                            </li>
                            <li class="header">Navigation</li>
                            <li>
                                <router-link to="/" aria-expanded="false">
                                        <i class="fas fa-home"></i> Home
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/insights" aria-expanded="false">
                                        <i class="fas fa-user-shield"></i> Insights
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="`/profile/${user.id}`" aria-expanded="false">
                                        <i class="fas fa-user"></i> Profile
                                </router-link>
                            </li>
                            <li class="header">Communities</li>
                            <li>
                                <router-link :to="`/community/create`" class="my-auto">
                                        <i class="fa fa-plus" aria-hidden="true"></i> New Community
                                </router-link>
                            </li>
                            <li v-for="community in FollowedCommunities" :key="community.id" class="">

                                <router-link :to="`/community/${community.id}`" class="my-auto">
                                        <img :src="community.cover_full_path" width="25" height="25" class="rounded-circle my-auto"> {{community.title}}
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="`/profile/${user.id}/communities`" aria-expanded="false">
                                        <i class="fas fa-arrow-right"></i> View All
                                </router-link>
                            </li>
                            <li class="header">Other</li>
                            <li>
                                <router-link :to="`/profile/${user.id}/friends`" aria-expanded="false">
                                        <i class="fa fa-users"></i> Friends
                                </router-link>
                                
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-cog" aria-hidden="true"></i> Settings
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i> Information
                                </a>
                            </li>
                        </ul>
                    </div>        
                    </li>

                    <!-- <li class="nav-item text-center">
                        <router-link to="/home" class="nav-link" aria-expanded="false">
                        <i class="fas fa-home"></i> Home
                        </router-link>
                    </li> -->

                    <li class="nav-item text-center">
                        <router-link to="/insights" class="nav-link" aria-expanded="false">
                        <i class="fas fa-user-shield"></i> Insights
                        </router-link>
                    </li>


                    <li class="nav-item dropdown notification my-auto">
                        <FriendRequests></FriendRequests>
                    </li>

                    <li class="nav-item dropdown notification my-auto">
                        <MessagesList :is_new='messages_list.new_exists' :messages='messages_list.list'>
                        </MessagesList>
                    </li>

                    <li class="nav-item dropdown notification my-auto">
                        <NotificationList :notifications='Notifications'
                            :is_new='false'>
                        </NotificationList>
                    </li>

                    <li class="nav-item dropdown nav-user"> 
                        <a class="nav-link nav-user-img" href="#"
                            id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img :src="user.avatar" class="user-avatar-md rounded-circle">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                            aria-labelledby="navbarDropdownMenuLink2">

                            <div class="nav-user-info">
                                <router-link :to="`/profile/${user.id}`" aria-expanded="false" class="nostyle">
                                    <h5 class="mb-0 text-white nav-user-name">{{user.name}}</h5>
                                </router-link>
                            </div> 

                            <router-link to="#" class="dropdown-item" aria-expanded="false">
                                <i class="fas fa-question mr-2"></i>Contact Support
                            </router-link>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cog mr-2"></i>Setting
                            </a>
                            <a class="dropdown-item nostyle"  @click="$store.dispatch('user/logout', null, {root:true});$router.push('/login')">
                                <i class="fas fa-sign-out-alt mr-2"></i>Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

</template>

<script>
    import FriendRequests from './FriendRequests';
    import MessagesList from './MessagesList';
    import NotificationList from './NotificationList';

    

    import { mapState } from 'vuex';
    export default {
        data() {
            return {

                halfPageHeightScrolled: false,
                scrolled50Px: false, // when scroll: set navbar background color
                friend_requests: {
                    'new_exists': true,
                    'requests': [{
                        'id': 3,
                        'seen': true,
                        'created_at': '2 hours ago',
                        'data': {
                            'friend': {
                                'name': 'Example Name',
                                'avatar': 'https://www.pavilionweb.com/wp-content/uploads/2017/03/man-300x300.png',
                            }
                        }
                    }]
                },

                messages_list: {
                    'new_exists': true,
                    'list': [{
                            'id': 513,
                            'message': 'Hello world this is my message from Brazil downtown',
                            'read': false,
                            'created_at': '2 min ago',
                            'user': {
                                'name': 'Soeme One',
                                'avatar': 'https://www.pavilionweb.com/wp-content/uploads/2017/03/man-300x300.png'
                            }
                        },

                        {
                            'id': 514,
                            'message': 'nwotnwod lizarB morf egassem ym si siht dlrow olleH',
                            'read': true,
                            'created_at': '2 hours ago',
                            'user': {
                                'name': 'Soeme Two',
                                'avatar': 'https://www.pavilionweb.com/wp-content/uploads/2017/03/man-300x300.png'
                            }
                        },

                    ]
                },

                notifications_list: {
                    'new_exists': true,
                    'list': [{
                            'id': 3,
                            'read': false,
                            'created_at': '2 hours ago',
                            'data': {
                                'user': {
                                    'name': 'Example Name',
                                    'avatar': 'https://www.pavilionweb.com/wp-content/uploads/2017/03/man-300x300.png',
                                },
                                'info': 'Shared a photo in Psychology Community',
                            }
                        },

                        {
                            'id': 4,
                            'read': true,
                            'created_at': '8 hours ago',
                            'data': {
                                'user': {
                                    'name': 'Eman Elpmaxe',
                                    'avatar': 'https://www.pavilionweb.com/wp-content/uploads/2017/03/man-300x300.png',
                                },
                                'info': 'Shared a photo in Biology Community',
                            }
                        }

                    ]
                },
            }
        },
        components: {
            FriendRequests,
            MessagesList,
            NotificationList
        },
        methods: {
            setNavBgColorOnDropdown() {
                this.setNavbarBgColor = this.scrolledLittle ? true : !this.setNavbarBgColor;
            },
            updateActiveNav(event) {
                document.getElementsByClassName('nav-item active')[0].classList.remove('active');
                event.target.parentElement.classList.add('active');
                if (window.innerWidth < 768)
                    document.getElementsByClassName('navbar-toggler')[0].click();
            }
        },
        computed: {
            FriendRequestsReceived() {
                return this.$store.state.notifications_long_term.filter(notification => {
                    notification.type == "FriendRequestSent";
                })
            },
            Notifications() {
                return this.$store.state.notifications_long_term;
            },
            currentNavbarBgColor() {
                return this.setNavbarBgColor ? 'bg-light navbar-light' : 'bg-transparent navbar-dark';
            },
            showArrowUp() {
                return this.halfPageHeightScrolled;
            },
            scrolledLittle: {
                set(value) {
                    this.scrolled50Px = value;
                },
                get() {
                    return this.scrolled50Px;
                }
            },
            setNavbarBgColor: {
                set(value) {
                    this.scrolledLittle = value;
                },
                get() {
                    return this.currentRoute == 'home' ? this.scrolledLittle : true;
                }
            },
            reachedHalfPage: {
                set(value) {
                    this.halfPageHeightScrolled = value;
                },
                get() {
                    return this.halfPageHeightScrolled;
                }
            },

            FollowedCommunities() {
                return this.user.followed_communities;
            },
            currentRoute() {
                return this.$route.name;
            },
            ...mapState(["user"])
        },

        mounted() {
            // 1- Display arrow Icon if reached to 1/2 or 1/3 of page height
            window.onscroll = () => {
                let scrollPosition = (window.pageYOffset || document.documentElement.scrollTop) - (document
                    .documentElement.clientTop || 0);
                let pageHeight = Math.max(document.body.scrollHeight, document.body.offsetHeight,
                    document.documentElement.clientHeight, document.documentElement.scrollHeight, document
                    .documentElement.offsetHeight);
                let halfPageHeight = pageHeight / 3;
                if (scrollPosition > halfPageHeight)
                    this.halfPageHeightScrolled = true;
                else
                    this.halfPageHeightScrolled = false;
                // 2- Set navbar background color if scrolled more than 50px
                let scrollHeight = window.scrollY;
                if (scrollHeight > 50) {
                    this.scrolled50Px = true;
                } else {
                    this.scrolled50Px = false;
                }
            }
        }

    }

</script>

<style >
    .navbar-logo {
        filter: invert(0);
        color: #fff;
        font-size: 45px;
        font-weight: bold;
        letter-spacing: 3px;
    }

    .navbar-logo:hover {
        color: #0381ff;
    }



    .navbar-collapse .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #80bdff;
        outline: 0;
        box-shadow: none !important
    }

    .dashboard-header .navbar {
        padding: 0px;
        border-bottom: 1px solid #e6e6f2;
        -webkit-box-shadow: 0px 0px 28px 0px rgba(82, 63, 105, 0.13);
        box-shadow: 0px 0px 28px 0px rgba(82, 63, 105, 0.13);
        -webkit-transition: all 0.3s ease;
        min-height: 60px;
        line-height: 30px;
    }

    .navbar-brand {
        display: inline-block;
        margin-right: 1rem;
        line-height: inherit;
        white-space: nowrap;
        padding: 11px 20px;
        font-size: 30px;
        text-transform: uppercase;
        font-weight: 700;
        color: #007bff
    }

    .navbar-brand:hover {
        color: #007bff
    }



    .navbar-right-top .nav-item {
        border-right: 1px solid rgb(0,0,0,0.05);
    }

    .navbar-right-top .nav-item:last-child {
        border: none
    }

    .navbar-right-top .nav-item .nav-link {
        padding: 13px 15px;
        font-size: 16px;
        line-height: 2;
        color: #82849f;
        text-align: center;
    }



    .nav-item.nav-itema[aria-expanded="true"],
    .nav-item.nav-item a[aria-expanded="true"] {
        background-color: #ccc;
        color: white;
    }

    .custom-search {
        width:25vw;
    }

    .notification-dropdown {
        min-width: 360px;
    }

    .notification-dropdown,
    .nav-user-dropdown {
        padding: 0px;
        margin: 0px
    }

    .notification-title {
        font-size: 14px;
        color: #3d405c;
        text-align: center;
        padding: 8px 0px;
        border-bottom: 1px solid #e3e3e3;
        line-height: 1.5;
        background-color: #fffffe
    }


    .notification-list .list-group-item {
        border-radius: 0px;
        padding: 12px;
        margin-top: -1px;
        border-left: transparent;
        border-right: transparent
    }

    .notification-list .list-group-item.active {
        z-index: 2;
        color: #3d405c;
        background-color: #f7f7fb;
        border-color: #e1e1e7
    }

    .notification-list .list-group-item-action:focus,
    .list-group-item-action:hover {
        color: #404040;
        text-decoration: none;
        background-color: #f7f7fb
    }




    .notification-info .notification-date {
        display: block;
        font-size: 11px;
        margin-top: 4px;
        text-transform: uppercase;
        color: #71748d
    }

    .notification .dropdown-toggle::after,
    .nav-user .dropdown-toggle::after {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: .255em;
        vertical-align: .255em;
        content: "";
        border: none
    }

    .notification-list-user-img {
        float: left
    }

    .notification-list-user-block {
        padding-left: 50px;
        font-size: 14px;
        line-height: 21px
    }

    .notification-list-user-name {
        color: #5969ff;
        font-size: 14px;
    }

    .list-footer,
    .conntection-footer {
        font-size: 14px;
        color: #fff;
        text-align: center;
        padding: 10px 0px;
        line-height: 1.5;
        font-weight: 700;
        background-color: #5969ff;
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px
    }

    .list-footer a,
    .conntection-footer a {
        color: #fff
    }

    .list-footer a:hover,
    .conntection-footer a:hover {
        color: #fff
    }

    .indicator {
        content: '3';
        position: absolute;
        top: 16px;
        right: 10px;
        display: inline-block;
        width: 7px;
        height: 7px;
        border-radius: 100%;
        background-color: #ef172c;
        animation: .9s infinite beatHeart;
        transform-origin: center
    }

    @keyframes beatHeart {
        0% {
            transform: scale(0.9)
        }

        25% {
            transform: scale(1.1)
        }

        40% {
            transform: scale(0.9)
        }

        60% {
            transform: scale(1.1)
        }

        100% {
            transform: scale(0.9)
        }
    }




    .nav-user-dropdown {
        padding: 0px;
        min-width: 230px;
        margin: 0px
    }



    .nav-user-info {
        background-color: #00adb5;
        line-height: 1.4;
        padding: 12px;
        color: #fff;
        font-size: 13px;
        border-radius: 2px 2px 0 0;
        text-align: center;
    }

    .nav-user-info .status {
        float: left;
        top: 7px;
        left: 0px
    }

    .capitalized {
        text-transform: capitalize;
    }

    .nav-user-dropdown .dropdown-item {
        display: block;
        width: 100%;
        padding: 12px 22px 15px;
        clear: both;
        font-weight: 400;
        color: #686972;
        text-align: inherit;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
        font-size: 13px;
        line-height: 0.4
    }

    .nav-user-dropdown .dropdown-item:hover {
        background-color: #f7f7fb
    }

    .user-avatar-xxl {
        height: 128px;
        width: 128px
    }

    .user-avatar-xl {
        height: 90px;
        width: 90px
    }

    .user-avatar-lg {
        height: 48px;
        width: 48px
    }

    .user-avatar-md {
        height: 32px;
        width: 32px
    }

    .user-avatar-sm {
        height: 24px;
        width: 24px
    }

    .user-avatar-xs {
        height: 18px;
        width: 18px
    }

    .avatar {
        width: 2.25rem;
        height: 2.25rem;
        border-radius: 50%;
        border: 2px solid #F7F9FA;
        background: #F7F9FA;
        color: #fff
    }

    .media-attachment div.avatar {
        border: none
    }

    .avatar.bg-primary {
        display: flex;
        align-items: center;
        justify-content: center
    }

    .avatar.bg-primary i {
        font-size: 14px
    }


    .message-item {
        color: rgb(163, 163, 163);
    }

    .sidebar-container {
    position: fixed;
    width: 220px;
    left: 0;
    overflow-x: hidden;
    overflow-y: auto;
    /* background: #1a1a1a; */
}

    .content-container {
    padding-top: 20px;
    }

    .sidebar-logo {
    padding: 10px 15px 10px 30px;
    font-size: 20px;
    background-color: #00adb5;
    color: white;
    text-align: center;
    }

    .sidebar-navigation {
    padding: 0;
    margin: 0;
    list-style-type: none;
    position: relative;
    max-height: 450px;
    }

    .sidebar-navigation li {
    background-color: transparent;
    position: relative;
    display: inline-block;
    width: 100%;
    line-height: 20px;
    }

    .sidebar-navigation li a {
    padding: 10px 15px 10px 30px;
    display: block;
    transition: 0.2s;
    color: #00adb5;
    }

    .sidebar-navigation li .fa {
    margin-right: 10px;
    }

    .sidebar-navigation li a:active,
    .sidebar-navigation li a:hover,
    .sidebar-navigation li a:focus {
    text-decoration: none;
    outline: none;
    color: white;
    transition: 0.2s;
    }

    .sidebar-navigation li::before {
    background-color: #00adb5;
    position: absolute;
    content: '';
    height: 100%;
    left: 0;
    top: 0;
    -webkit-transition: width 0.2s ease-in;
    transition: width 0.2s ease-in;
    width: 3px;
    z-index: -1;
    }

    .sidebar-navigation li:hover::before {
    width: 100%;
    }

    .sidebar-navigation .header {
    font-size: 12px;
    text-transform: uppercase;
    /* background-color: #151515; */
    padding: 10px 15px 10px 30px;
    }

    .sidebar-navigation .header::before {
    background-color: transparent;
    }

    .content-container {
    padding-left: 220px;
    }

    .community-item {
        display: flex !important;
        line-height: 42px !important;
    }
</style>
