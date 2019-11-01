require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';

Vue.use(VueRouter);

// window.axios = require('axios');
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import upperFirst from 'lodash/upperFirst'
import camelCase from 'lodash/camelCase'

const requireComponent = require.context(
    // The relative path of the components folder
    './components',
    // Whether or not to look in subfolders
    false,
    // The regular expression used to match base component filenames
    /Base[A-Z]\w+\.(vue|js)$/
)

requireComponent.keys().forEach(fileName => {
    // Get component config
    const componentConfig = requireComponent(fileName)

    // Get PascalCase name of component
    const componentName = upperFirst(
        camelCase(
            // Gets the file name regardless of folder depth
            fileName
            .split('/')
            .pop()
            .replace(/\.\w+$/, '')
        )
    )

    // Register component globally
    Vue.component(
        componentName,
        // Look for the component options on `.default`, which will
        // exist if the component was exported with `export default`,
        // otherwise fall back to module's root.
        componentConfig.default || componentConfig
    )
})

Vue.config.productionTip = false;

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});