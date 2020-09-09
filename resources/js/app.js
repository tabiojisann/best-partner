/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


window.Vue = require('vue');

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

import './bootstrap'
import './cookie'
import Vue from 'vue'
import ArticleKeep from './components/Article/ArticleKeep'
import FollowButton from './components/User/FollowButton'
import ArticleImageUpload from './components/Article/ArticleImageUpload'
import UserImageUpload from './components/User/UserImageUpload'
import UserTextarea from './components/User/UserTextarea'
import NameValidate from './components/Auth/NameValidate'
import EmailValidate from './components/Auth/EmailValidate'
import PasswordValidate from './components/Auth/PasswordValidate'



const app = new Vue({
    el: '#app',
    components: {
        ArticleKeep,
        FollowButton,
        ArticleImageUpload,
        UserImageUpload,
        UserTextarea,
        NameValidate,
        EmailValidate,
        PasswordValidate,
    }
});
