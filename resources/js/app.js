require('./bootstrap');

import Vue from 'vue'

window.Vue = require('vue');

import VModal from 'vue-js-modal'
Vue.use(VModal)

Vue.component('modal-link', require('./components/Modals/ModalLink.vue').default);
Vue.component('modal-component', require('./components/Modals/ModalComponent.vue').default);
Vue.component('modal-confirmation', require('./components/Modals/ModalConfirmation.vue').default);
