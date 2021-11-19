import {createWebHistory, createRouter} from "vue-router";

import Home from '../pages/Home.vue';
import About from '../pages/About.vue';
import Login from '../pages/Login.vue';
import Dashboard from '../pages/Dashboard.vue';
import Contact from '../pages/Contact.vue';

import Paintings from '../components/Paintings.vue';
import AddPainting from '../components/AddPainting.vue';
import EditPainting from '../components/EditPainting.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'paintings',
        path: '/paintings',
        component: Paintings
    },
    {
        name: 'addpainting',
        path: '/paintings/add',
        component: AddPainting
    },
    {
        name: 'editpainting',
        path: '/paintings/edit/:id',
        component: EditPainting
    },
     {
        name: 'contact',
        path: '/contact',
        component: Contact
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
