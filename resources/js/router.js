import { createRouter, createWebHistory } from "vue-router";

import HomeComponent from './Pages/HomeComponent.vue';
import RegisterComponent from './Pages/auth/RegisterComponent.vue';
import LoginComponent from './Pages/auth/LoginComponent.vue';
import NotFoundComponent from './Pages/NotFoundComponent.vue';

const routes = [
    {
        path: '/',
        component: HomeComponent,
    },
    {
        path: '/register',
        component: RegisterComponent,
    },
    {
        path: '/signIn',
        component: LoginComponent,
    },
    {
        path: '/:pathMatch(.*)*',
        component: NotFoundComponent
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;