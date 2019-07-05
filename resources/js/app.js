

require('./bootstrap');


window.Vue = require('vue');

import VueRouter from 'vue-router';
import router from './router';
import App from './components/App.vue';




// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.use(VueRouter);
// Vue.component('example-component', require('./components/LoginComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    render : h=>h(App),
    router
});