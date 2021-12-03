import Vue from 'vue';
import App from "./App.vue";
import Layout from "./layout/default/Layout.vue";


import router from './plugins/router'
import store from './store/store'
import toast from './plugins/toast'

require('./bootstrap');

Vue.component('default-layout', Layout)

const app = new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});
