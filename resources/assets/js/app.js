import Vue from 'vue'
import App from './vue/App'
import router from "./vue/router/routes";
import store from './vue/store';
import Notifications from "vue-notification";
import { BootstrapVue } from 'bootstrap-vue';
import vuescroll from 'vuescroll';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)
Vue.use(vuescroll)

require('./bootstrap');

Vue.use(Notifications);


window.Vue = require('vue').default;

const app = new Vue({
    el: '#app',
    components: {App},
    router, 
    store
});
