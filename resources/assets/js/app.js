/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('committee', require('./components/Committee.vue'));
Vue.component('currency-input', require('./components/CurrencyInput.vue'));
Vue.component('cost-centre', require('./components/CostCentre.vue'));
Vue.component('budget-line', require('./components/BudgetLine.vue'));
Vue.component('alert', require('./components/Alert.vue'));

Vue.mixin({
  methods: {
  	fmt: function(val, decimals, decimalSign, thousandDelimiter) {
        decimals = decimals || 0;
        decimalSign = decimalSign || ',';
        thousandDelimiter = thousandDelimiter || ' ';
        let sign = val < 0 ? '-' : '';
        let absValString = String(parseInt(Math.abs(Number(val) || 0).toFixed(decimals)))
        let firstThousand = absValString.length > 3 ? absValString.length % 3 : 0;
        return sign 
            + (firstThousand > 0 ? absValString.substr(0, firstThousand) + thousandDelimiter : '')
            + (absValString.substr(firstThousand).replace(/(\d{3})(?=\d)/g, "$1" + thousandDelimiter))
            + (decimals > 0 ? decimalSign + Math.abs(val - Math.abs(Number(val) || 0).toFixed(0)).toFixed(decimals).slice(2) : '')
    },
    defmt: function(val) {
        val = String(val || '').replace(/(\s)/g, "")
        if (val.indexOf(',') !== -1) {
            return val.substr(0, val.indexOf(','))
        }
        return val
    }
  }
})

if (document.getElementById('app')) {
    const app = new Vue({
        el: '#app'
    });
}