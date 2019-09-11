import Vue from 'vue';
import VueRouter from 'vue-router';

import HomeComponent from './components/HomeComponent';
import ClientsComponent from './components/ClientsComponent';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeComponent
        },
        {
            path: '/clients',
            name: 'clients',
            component: ClientsComponent
        }
    ]
});

export default router;
