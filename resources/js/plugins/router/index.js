import Vue from 'vue';
import VueRouter from 'vue-router'

import routes from "./routes";

Vue.use(VueRouter)


const options = {
    mode: 'history',
    routes,
}

const router = new VueRouter(options)


export default router;
