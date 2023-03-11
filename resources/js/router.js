// import Vue from 'vue';
import {createRouter, createWebHistory} from 'vue-router';
import adminPage from '../components/pages/admin.vue';

const routes = [
    {path: '/admin', name: 'Home', component: adminPage}
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
