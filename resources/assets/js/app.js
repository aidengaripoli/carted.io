
require('./bootstrap')

window.Vue = require('vue')

Vue.component('payment-form', require('./components/PaymentForm.vue'))
Vue.component('payment-selection', require('./components/PaymentSelection.vue'))

const app = new Vue({
  el: '#app'
})
