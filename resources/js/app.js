/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

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

Vue.component('select-major', require('./components/SelectMajor.vue').default);
Vue.component('select-classroom', require('./components/SelectClassroom.vue').default);
Vue.component('major-data', require('./components/MajorData.vue').default);
Vue.component('cancel-teaching-button', require('./components/CancelTeachingButton.vue').default);
Vue.component('insert-classroom-button', require('./components/admin/InsertClassroomButton.vue').default);
Vue.component('insert-subject-button', require('./components/admin/InsertSubjectButton.vue').default);
Vue.component('search-user-box', require('./components/SearchUserBox.vue').default);
Vue.component('select-user-by-search', require('./components/admin/SelectUserBySearch.vue').default);
Vue.component('select-subject-by-search', require('./components/admin/SelectSubjectBySearch.vue').default);
Vue.component('manageschedules-selectmajor', require('./components/admin/ManageSchedulesSelectMajor.vue').default);
Vue.component('userlist-search', require('./components/admin/UserListSearch.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app'
});
