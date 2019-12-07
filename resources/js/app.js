import 'mdbvue/lib/css/mdb.min.css'
import Swal from 'sweetalert2'
import Vue from 'vue'
import VueRouter from 'vue-router'

require('./bootstrap');

window.Vue = require('vue');
Vue.use(VueRouter)

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});
