<template>
  <div>
                          <div class="row text-sm-left">
                        <div class="col-md-6 mt-3">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="row text-center">
                                        <div class="col-12">
                                            <h5>Personal Info</h5>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6 col-sm-5 col-lg-5">
                                            <span><i class="fas fa-user"></i> Personality Type</span> 
                                        </div>
                                        <div class="col-6 col-sm-5 col-md-4 col-lg-5 text-secondary text-right text-sm-left">
                                            {{user.personality}}
                                        </div>
                                        <div class="col-12 col-sm-2 text-center" v-if='authorView'>
                                            <PrivacyDropdown @privacyChanged='updatePrivacy' forWhat='personality' v-if='this.$parent.profileEditMode' :selected='user.privacy.personality.type'></PrivacyDropdown>
                                            <PrivacyItem v-else :type='user.privacy.personality.type' :showText='false'></PrivacyItem>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6 col-sm-5 col-lg-5">
                                            <span><i class="fas fa-brain"></i></span> Learning Style
                                        </div>
                                        <div class="col-6 col-sm-5 col-md-4 col-lg-5 text-secondary text-right text-sm-left">
                                            {{user.learning_style}}
                                        </div>
                                        <div class="col-12 col-sm-2 text-center" v-if='authorView'>
                                            <PrivacyDropdown @privacyChanged='updatePrivacy' forWhat='learning_style' v-if='this.$parent.profileEditMode' :selected='user.privacy.learning_style.type'></PrivacyDropdown>
                                            <PrivacyItem v-else :type='user.privacy.learning_style.type' :showText='false'></PrivacyItem>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6 col-sm-5 col-lg-5">
                                            <span><i class="far fa-smile"></i></span> Mood
                                        </div>
                                        <div class="col-6 col-sm-5 col-md-4 col-lg-5 text-secondary text-right text-sm-left">
                                            {{user.emotions}}
                                        </div>
                                        <div class="col-12 col-sm-2 text-center" v-if='authorView'>
                                            <PrivacyDropdown @privacyChanged='updatePrivacy' forWhat='emotions' v-if='this.$parent.profileEditMode' :selected='user.privacy.emotions.type'></PrivacyDropdown>
                                            <PrivacyItem v-else :type='user.privacy.emotions.type' :showText='false'></PrivacyItem>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6 col-sm-5 col-lg-5">
                                            <span><i class="fas fa-venus-mars"></i></span> Gender
                                        </div>
                                        <div class="col-6 col-sm-5 col-md-4 col-lg-5 text-secondary text-right text-sm-left">
                                            {{user.gender.type}}
                                        </div>
                                        <div class="col-12 col-sm-2 text-center" v-if='authorView'>
                                            <PrivacyDropdown @privacyChanged='updatePrivacy' forWhat='gender' v-if='this.$parent.profileEditMode' :selected='user.privacy.gender.type'></PrivacyDropdown>
                                            <PrivacyItem v-else :type='user.privacy.gender.type' :showText='false'></PrivacyItem>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="row text-center">
                                        <div class="col-12">
                                            <h5>Account Info</h5>
                                        </div>
                                    </div>
                                    <hr>
                                   <div class="row">
                                        <div class="col-6 col-sm-5 col-md-4 col-lg-4">
                                            <span><i class="fas fa-at"></i> Email</span> 
                                        </div>
                                        <div class="col-6 col-sm-5 col-md-5 col-lg-6 text-secondary text-right text-sm-left">
                                            {{user.email}}
                                        </div>
                                        <div class="col-12 col-sm-2 text-center" v-if='authorView'>
                                            <PrivacyDropdown @privacyChanged='updatePrivacy' forWhat='email' v-if='this.$parent.profileEditMode' :selected='user.privacy.email.type'></PrivacyDropdown>
                                            <PrivacyItem v-else :type='user.privacy.email.type' :showText='false'></PrivacyItem>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6 col-sm-5 col-md-4 col-lg-4">
                                            <span><i class="far fa-clock"></i></span> Joined
                                        </div>
                                        <div class="col-6 col-sm-5 col-md-5 col-lg-6 text-secondary text-right text-sm-left">
                                            {{dateProcessor.formatDateYMD(new Date(user.created_at))}}
                                        </div>
                                        <div class="col-12 col-sm-2 text-center" v-if='authorView'>
                                            <PrivacyDropdown @privacyChanged='updatePrivacy' forWhat='join_date' v-if='this.$parent.profileEditMode' :selected='user.privacy.join_date.type'></PrivacyDropdown>
                                            <PrivacyItem v-else :type='user.privacy.join_date.type' :showText='false'></PrivacyItem>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6 col-sm-5 col-md-4 col-lg-4">
                                            <span><i class="fas fa-phone-square-alt"></i></span> Phone
                                        </div>
                                        <div class="col-6 col-sm-5 col-md-5 col-lg-6 text-secondary text-right text-sm-left">
                                            {{user.phone_number}}
                                        </div>
                                        <div class="col-12 col-sm-2 text-center" v-if='authorView'>
                                            <PrivacyDropdown @privacyChanged='updatePrivacy' forWhat='phone_number' v-if='this.$parent.profileEditMode' :selected='user.privacy.phone_number.type'></PrivacyDropdown>
                                            <PrivacyItem v-else :type='user.privacy.phone_number.type' :showText='false'></PrivacyItem>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6 col-sm-5 col-md-4 col-lg-4">
                                            <span><i class="fas fa-globe-europe"></i></span> Country
                                        </div>
                                        <div class="col-6 col-sm-5 col-md-5 col-lg-6 text-secondary text-right text-sm-left">
                                            {{user.country.name}}
                                        </div>
                                        <div class="col-12 col-sm-2 text-center" v-if='authorView'>
                                            <PrivacyDropdown @privacyChanged='updatePrivacy' forWhat='country' v-if='this.$parent.profileEditMode' :selected='user.privacy.country.type'></PrivacyDropdown>
                                            <PrivacyItem v-else :type='user.privacy.country.type' :showText='false'></PrivacyItem>
                                        </div>
                                    </div>
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col-12 col-md-10 col-lg-8  posts-container">
                            <div class="mt-2 posts-list" v-for='post in posts' :key='post.id'>
                                <Post
                                :post='post'
                                ></Post>
                            </div>
                        </div>
                    </div>
  </div>
</template>

<script>
import PrivacyDropdown from '../../components/PrivacyDropdown';
import PrivacyItem from '../../components/PrivacyItem';
import Post from '../../components/Post';

import {
        mapState
    } from 'vuex';
import  DateProcessor from '../../services/Date.js';
export default {
    
    data() {
        return {
            posts:this.$parent.posts,
            authorView:this.$parent.authorView,
            dateProcessor: new DateProcessor()

        }
    },

    computed:{
        user() {
            return this.$parent.user;
        }
    },

    components: {
            PrivacyDropdown,
            PrivacyItem,
            Post,
    },
    methods: {
        privacyTypeToId(type) {
                let dictionary = {
                    'public': 1,
                    'friends':2,
                    'private':3
                };
                return dictionary[type];
            },
            updatePrivacy(forWhat, privacyType) {
                this.user.privacy[forWhat].id = this.privacyTypeToId(privacyType);
                this.user.privacy[forWhat].type = privacyType;
                console.log(this.user.privacy[forWhat]);
            },
             
    }
}
</script>

<style scoped>
.row {
        height: inherit;
    }


    .card {
        height: 100%;
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }
</style>