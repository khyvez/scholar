

require('./bootstrap');

window.Vue = require('vue');

import { Form, HasError, AlertError } from 'vform'
//import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)
//window.form = Form;

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('all-students', require('./components/AllStudent.vue').default);


const app = new Vue({
    el: '#app',
});
