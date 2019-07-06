// require('./bootstrap');

import Vue from 'vue';
import CreateEditPostTemplate from './components/post-templates/create-edit-post-template';

Vue.component('create-edit-post-template', CreateEditPostTemplate);

let app = new Vue({
    el: '#app',
});
