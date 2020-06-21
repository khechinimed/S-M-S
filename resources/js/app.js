/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//Progress Bar package
import VueProgressBar from 'vue-progressbar'

Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '3px'
})

//sweat alert
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
window.Toast = Toast;
window.Swal = Swal;

//Laravel - Vue Pagination
Vue.component('pagination', require('laravel-vue-pagination'));

//Moment js filter
import moment from 'moment';

//VFORM PACKAGE (anxos / vform)
import { Form, HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//Gate
import Gate from "./Gate";
Vue.prototype.$gate = new Gate(window.user);

window.Form = Form;
import VueRouter from 'vue-router'
Vue.use(VueRouter)

let routes = [
    { path: '/home', component: require('./components/Dashboard.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/class', component: require('./components/Class.vue').default },
    { path: '/notes', component: require('./components/Notes.vue').default },
    { path: '/students', component: require('./components/Student.vue').default },
    { path: '/teachers', component: require('./components/Teacher.vue').default },
    { path: '/developer', component: require('./components/Developer.vue').default },
    { path: '*', component: require('./components/noFound.vue').default }
]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

//global filter example
Vue.filter('upText', function(text){
    return text.charAt(0).toUpperCase() + text.slice(1);
});

Vue.filter('myDate', function(created){
    return moment(created).format('MMMM Do YYYY');
});

window.Fire = new Vue();

Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue').default
);

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue').default
);

//404 error page
Vue.component(
  'not-found',
  require('./components/noFound.vue').default
);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    data: {
      search: ''
    },
    methods: {
      //utiliser js library lodach pour que la liste de recherche se charge une seconde après saisie
      searchit: _.debounce(() => {
        Fire.$emit('searching');
      }, 1000),

      //fonction pour imprimer
      printme(){
        window.print();
      }

    }
});
