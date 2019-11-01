import ProductList from './components/ProductList.vue';
import HomeComponent from './components/HomeComponent.vue';
import ProductShow from './components/ProductShow.vue';

export default {
    mode: 'history',
    routes: [{
        path: '/',
        name: 'home-component',
        component: HomeComponent
    }, {
        path: '/product-list',
        name: 'product-list',
        component: ProductList
    }, {
        path: '/product/:id',
        name: 'product-show',
        component: ProductShow,
        props: true
    }]
}