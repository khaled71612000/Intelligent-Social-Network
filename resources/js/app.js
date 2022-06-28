/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

window.Pusher = require('pusher-js');

// import wysiwyg from "vue-wysiwyg";


import App from './views/App.vue';
import Home from './views/Home.vue';

import Emotification from './components/Emotification.vue';

import Store from './store/index.js';
import Router from './router/index.js';

import NavBar from './components/NavBar.vue';

import '@fortawesome/fontawesome-free/css/all.css';


window.Vue.component("NavBar", NavBar)
window.Vue.component("Emotification", Emotification)
window.Vue.component("Home", Home)

const store = Store;
const router = Router;


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
      App,
    }
});




// function diffDate(date1, date2) { // Date function
//   let diffTime = Math.abs(date2 - date1);
//   let months = Math.floor(diffTime / (1000 * 60 * 60 * 24 * 7 * 12))
//   let weeks = Math.floor(diffTime / (1000 * 60 * 60 * 24 * 7));
//   let  days = Math.floor(diffTime/ (1000 * 60 * 60 * 24)); 
//   let  hours = Math.floor(diffTime / (1000*60*60));
//   let  minutes = Math.floor(diffTime / (1000*60));
//   let seconds = Math.floor(diffTime / (1000));
//   let result = {
//       months,weeks,days, hours, minutes, seconds
//   }
//   return result;
//   }