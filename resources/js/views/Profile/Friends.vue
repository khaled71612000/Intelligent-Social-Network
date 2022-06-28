<template>
  <div class="row justify-content-center mt-5">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6">
          <div class="input-group mb-2">
                <input type="search" class="form-control rounded" placeholder="Find a friend" aria-label="Search"
                    aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-primary"><i class="fas fa-search"></i></button>
            </div>
          <div class="friends-list">

            <div class="people-nearby bg-white">
              
              <div class="nearby-user" v-for='friend in Friends' :key='friend.id'>
                <div class="row justify-content-around align-items-center">
                  <div class="col-3 user-avatar-container">
                    <router-link :to="`/profile/${friend.id}`"><img :src='friend.avatar_full_path' :alt="`${friend.name}`" class="profile-photo-lg"></router-link>
                  </div>
                  <div class="col-5 text-left">
                    <h5 class="my-auto"><router-link :to="`/profile/${friend.id}`" class="profile-link">{{friend.name}}</router-link></h5>
                  </div>
                  <div class="col-4 text-right">
                    <div class="menu-container dropleft" v-if='authorView && isMyFriend(friend.id)'>
                        <span id="action_menu_btn" class='btn btn-primary btn-sm' data-toggle="dropdown">Friends ✔</span>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a  class="dropdown-item" href="#" v-if='isEmotifiable(friend.id)' @click="takeOffEmotification(friend.id)">
                                <span><i class="fas fa-user-shield"></i></span> Emotifications Granted ✔
                            </a>
                            <a  class="dropdown-item" href="#" v-else @click="grantEmotification(friend.id)">
                                <span><i class="fas fa-user-shield"></i></span> Grant Emotifications
                            </a>
                            <a class="dropdown-item nostyle" @click="removeFriend(friend.name, friend.id)" >
                                <span><i class="fas fa-user-times"></i></span> Unfriend
                            </a>
                            <a class="dropdown-item" href="#">
                                <span><i class="far fa-flag"></i></span> Report
                            </a>
                            <a class="dropdown-item" href="#">
                                <span><i class="fas fa-ban"></i></span> Block
                            </a>
                        </div>
                    </div>
                    <button v-else-if="isMyFriend(friend.id)" class="btn btn-primary">Friends <i class="fas fa-user-check"></i></button>
                    <button @click="addFriend(friend)" v-else class="btn btn-outline-primary"><i class="fas fa-user-plus"></i> Add Friend</button>
                  </div>
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
            authorView: this.$parent.authorView,
        }
    },
    computed: {

      Friends() {
        return this.$store.state.user.friends;
      },
      Emotifiables() {
        return this.$store.state.user.emotifiables;
      },
    },
    methods: {
      isMyFriend(id) {
                let that = this;
                return that.Friends.find(friend => {
                    return friend.id == id;
                })
      },
      isEmotifiable(id) {
        return this.Emotifiables.includes(id);
      },
      addFriend(user) {
        this.$store.dispatch('user/sendFriendRequest', user);
      },
      removeFriend(name, id) {
        // alert
        let confirm = window.confirm("Are you sure you want to unfriend "+ name + " ?"); // user's answer
        if(confirm) {
          this.$store.dispatch("user/removeFriend", id);
        }
      },

      grantEmotification(friend_id) {
        this.$store.dispatch('user/grantEmotification', friend_id);
      },
      takeOffEmotification(friend_id) {
        this.$store.dispatch('user/takeOffEmotification', friend_id);
      }
    }
}
</script>

<style scoped>
.people-nearby .google-maps{
  background: #f8f8f8;
  border-radius: 4px;
  border: 1px solid #f1f2f2;
  padding: 20px;
  margin-bottom: 20px;
}

.people-nearby .google-maps .map{
  height: 300px;
  width: 100%;
  border: none;
}

.people-nearby .nearby-user{
  padding: 20px 10px;
  border-bottom: 1px solid #f1f2f2;
}

img.profile-photo-lg{
  height: 60px;
  width: 60px;
  border-radius: 50%;
}
.user-avatar-container {
    max-width: 100px !important;
}

.people-nearby {
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
</style>