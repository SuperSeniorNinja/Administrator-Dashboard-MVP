/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import App from './components/App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import OwnersStatisticsComponent from './components/OwnersStatisticsComponent.vue';
Vue.component('owner-statistics-component', OwnersStatisticsComponent);
import AddressStatisticsComponent from './components/AddressStatisticsComponent.vue';
Vue.component('address-statistics-component', AddressStatisticsComponent);


Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(VueSweetalert2);

import 'vuejs-datatable/dist/themes/bootstrap-4.esm';
import {VuejsDatatableFactory} from 'vuejs-datatable';
Vue.use(VuejsDatatableFactory);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App)
});
