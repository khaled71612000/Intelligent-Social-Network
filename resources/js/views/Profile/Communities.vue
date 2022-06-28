<template>
  <div class="row justify-content-center mt-5">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6">
          <div class="input-group mb-2">
                <input type="search" class="form-control rounded" placeholder="Find a community" aria-label="Search"
                    aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-primary"><i class="fas fa-search"></i></button>
            </div>
          <div class="community-list">

            <div class="people-nearby bg-white">
              
              <div class="nearby-user" v-for='community in this.$parent.getCommunities' :key='community.id'>
                <div class="row justify-content-around align-items-center">
                  <div class="col-3 user-avatar-container">
                    <a :href="`/community/${community.id}`"><img :src='community.cover_full_path' :alt="`${community.name}`" class="profile-photo-lg"></a>
                  </div>
                  <div class="col-6 text-left">
                    <h5 class="my-auto"><a :href="`/community/${community.id}`" class="profile-link">{{community.title}}</a></h5>
                  </div>
                  <div class="col-3 text-right">
                    <div class="menu-container dropleft" v-if='userIsJoined(community.id)'>
                        <span id="action_menu_btn" class='btn btn-primary btn-sm' data-toggle="dropdown">Joined ✔</span>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" v-if="!userIsTheOwner(community.owner_id)">
                                <span><i class="far fa-flag"></i></span> Report
                            </a>
                            <a class="dropdown-item nostyle" @click="leaveCommunity(community.id)">
                                <span><i class="fas fa-user-times"></i></span> Leave
                            </a>
                        </div>
                    </div>
                    <button v-else class="btn btn-outline-primary" @click="joinCommunity(community.id)"><i class="fas fa-sign-in-alt"></i> Join</button>
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
            communities_ids: this.$parent.getCommunities.map(community => community.id),
            user: this.$parent.user,
            defaultCoverImage: "https://bootdey.com/img/Content/avatar/avatar1.png"
            
        }
    },
    computed: {
        getCommunitiesIds() {
            return this.communities_ids
        },
    },
    methods: {
        userIsJoined(community_id) {
            return this.getCommunitiesIds.includes(community_id);
        },
        userIsTheOwner(community_owner_id) {
            return community_owner_id == this.user.id
        },
        joinCommunity(id) {

            this.$store.dispatch('user/followCommunity', id);
            // send to request
        },
        leaveCommunity(id) {
            this.$store.dispatch('user/unfollowCommunity', id);
            // send to server
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