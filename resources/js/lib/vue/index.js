import Inertia from 'inertia-vue';
import PortalVue from 'portal-vue';
import Vue from 'vue';
import store from 'JS/store';

// Use Global Mixins
import Dispatchable from 'Mixins/Dispatchable';
import Dates from 'Mixins/Dates';
import HasNotifications from 'Mixins/HasNotifications';

// Use ziggy route mixin
Vue.mixin({ methods: { route: window.route } });

// Use PortalVue
Vue.use(PortalVue);

Vue.mixin(Dispatchable);
Vue.mixin(Dates);
Vue.mixin(HasNotifications);

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

let app = document.getElementById('app')
new Vue({
    render: h => h(Inertia, {
        props: {
            component: app.dataset.component,
            props: JSON.parse(app.dataset.props),
            resolveComponent: (component) => {
                return import(`@/Pages/${component}`).then(module => module.default)
            },
        },
    }),
    data: { store },
}).$mount(app);