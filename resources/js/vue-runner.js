window.Vue = require('vue');

let cheader = require('./components/Header.vue').default;
let cheadbanner = require('./components/HeadBanner.vue').default;
let ccontent = require('./components/Content.vue').default;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
var app = new Vue({
    el: '#app',
    components:{cheader, cheadbanner, ccontent}
});
