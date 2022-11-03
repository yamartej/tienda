require('./bootstrap');

window.Vue = require('vue').default;
import Vue from 'vue';

import VueRouter from 'vue-router';

import { Form, HasError, AlertError } from 'vform'

window.Form = Form;

Vue.use(VueRouter);

import Shop from  './components/orders/Shop.vue';
import List from  './components/orders/List.vue';

const routes = [
    {
        path:'/order', 
        component: Shop,
    },
    {
        path:'/order/list', 
        component: List,
    }

];
const router = new VueRouter({routes});

const app = new Vue({
    el: '#app',
    router: router
});
