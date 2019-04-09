import Vue from 'vue';
import store from 'JS/store';

// Use Global Mixins
import Dispatchable from 'Mixins/Dispatchable';
import Dates from 'Mixins/Dates';

Vue.mixin(Dispatchable);
Vue.mixin(Dates);

// Register all the Vue components
const files = require.context('../../', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Use Vue-Stash for state management
import VueStash from 'vue-stash';
Vue.use(VueStash);

// Use Vue-Modal
import VModal from 'vue-js-modal';
Vue.use(VModal, { componentName: "modal-component" });

// Use Snotify for notifications
import Snotify, { SnotifyPosition } from 'vue-snotify';
const options = {
    toast: {
        position: SnotifyPosition.rightTop,
        timeout: 3000,
        showProgressBar: true,
        closeOnClick: false,
        pauseOnHover: true
    }
}
Vue.use(Snotify, options)

// Filters
Vue.filter('ucase', function (value) {
    return value ? value.toUpperCase() : '';
});

new Vue({
    el: '#base-app',
    data: { store },
});