import VueRouter from 'vue-router';


import Chat from '../components/Chat.vue';
import Login from '../views/Auth/Login.vue';
import RegisterationStep1 from '../views/Auth/Registeration/Step1.vue';
import RegisterationStep2 from '../views/Auth/Registeration/Step2.vue';
import RegisterationStep3 from '../views/Auth/Registeration/Step3.vue';
import Insights from '../views/Insights.vue';
import Community from '../views/Community.vue';
import CommunityHome from '../views/Community/Home.vue';
import CommunityPost from '../views/Community/SinglePost.vue';

import LearningStyle from '../views/insights/LearningStyle.vue';
import PersonalityType from '../views/insights/PersonalityType.vue';
import Relationships from '../views/insights/Relationships.vue';
import Home from '../views/Home.vue';
import Friends from '../views/Profile/Friends.vue';
import UserCommunities from '../views/Profile/Communities.vue';
import CreateCommunity from '../views/CreateCommunity.vue';

// import Photos from '../views/Profile/Photos.vue';
import Main from '../views/Profile/Main.vue';


import Profile from '../views/Profile.vue';
import store from '../store';

window.Vue = require('vue');
window.Vue.use(VueRouter);

let routes = [
    // { path: '/', components: {
    //   default: Login,
    //   chat: Chat,
    // },
    //  },
    {
      path: '/register/1', component: RegisterationStep1 , name: "register-1", alias:"/register"
    },
    {
      path: '/register/2', component: RegisterationStep2 , name: "register-2",
      // beforeEnter: (to, from, next) => {
      //   if (! store.getters["userForm/step1IsValid"]) {
      //     next({ name: 'register-1' });
      //   } 
      //   else {
      //     next();
      //   }
      // }
    },
    {
      path: '/register/3', component: RegisterationStep3 , name: "register-3",
      // beforeEnter: (to, from, next) => {
      //   if (! store.getters["userForm/step2IsValid"]) {
      //     next({ name: 'register-2' });
      //   } 
      //   else {
      //     next();
      //   }
      // }
    },
    {
      path: '/login', component: Login , name: "login"
    },
    {
      path: '/chat', component: Chat , name: "chat", meta: {authorized:true}
    },

    {
      path: '/', component: Home , name: "home", meta:{authorized:true}
    },

    {
      path: '/insights', component: Insights , name: "insights", meta:{authorized:true}
    },
    
    {
      path: '/community/create', component: CreateCommunity , name: "create_community", meta:{authorized:true}
    },
    {
      path: '/community/:id', component: Community , name: "community", meta:{authorized:true},
      children:[
        {
          path:'',
          component:CommunityHome,
          name:"community_home"
        },
        {
          path:'post/:post_id',
          component:CommunityPost,
          name:"community_post",
        }
      ]
    },
    {
      path: '/insights/learning/:learning_style', component: LearningStyle , name: "learning", meta:{authorized:true}
    },
    {
      path: '/insights/personality/:type', component: PersonalityType , name: "personality", meta:{authorized:true}
    },
    {
      path: '/insights/relationship/:userPersonality/:friendPersonality', component: Relationships , name: "relationship", meta:{authorized:true}
    },
    {
      path: '/profile/:id', component: Profile , name: "profile", meta:{authorized:true},
      children: [
        {
          path: '',
          component: Main,
          name:'user_main_profile',
        },
        {
          path: 'friends',
          component: Friends,
          name:'user_friends',
        },
        {
          path: 'communities',
          component: UserCommunities,
          name:'user_communities',
        },
        // {
        //   path: 'photos',
        //   component: Photos,
        //   name:'user_photos',
        // }
      ]
    },
    {
      path: '/posts/:id', component: Community , name: "post_view", meta:{authorized:true}
    }
  ]

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode:"history" // or html5
})

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.authorized)) {
    // this route requires auth, check if logged in
    if(store.getters["getToken"] != null) {
      console.log(store.getters['getSocketId']);
      window.axios.defaults.headers.common['X-Socket-ID'] = store.getters['getSocketId'];
      window.axios.defaults.headers.common['Authorization'] = `Bearer ${store.getters['getToken']}`;
      next();
      return
    }
    else {
      console.log(from.fullPath);
      next("/login")
    }
    // if not, redirect to login page.
  }
  else {
    next();
  }
});

  
export default router
