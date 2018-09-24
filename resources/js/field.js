Nova.booting((Vue, router) => {
    Vue.component('index-nova-mixcloud-field', require('./components/IndexField'));
    Vue.component('detail-nova-mixcloud-field', require('./components/DetailField'));
    Vue.component('form-nova-mixcloud-field', require('./components/FormField'));
})