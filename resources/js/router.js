import { createRouter, createWebHistory } from "vue-router";

import HomeComponent from './Pages/HomeComponent.vue';
import RegisterComponent from './Pages/auth/RegisterComponent.vue';
import LoginComponent from './Pages/auth/LoginComponent.vue';
import DashboardComponent from './Pages/DashboardComponent.vue';
import ShowDashboard from './components/dashboard/ShowDashboard.vue';
import CategoryComponent from './components/dashboard/CategoryComponent.vue';
import FoodComponent from './components/dashboard/FoodComponent.vue';
import FoodPriceComponent from './components/dashboard/FoodPriceComponent.vue';
import ContactComponent from './components/dashboard/ContactComponent.vue';
import NotFoundComponent from './Pages/NotFoundComponent.vue';

const routes = [
    {
        name: 'menu',
        path: '/menu',
        component: HomeComponent,
    },
    {
        path: '/register',
        component: RegisterComponent,
    },
    {
        path: '/login',
        component: LoginComponent,
    },
    {
        path: '/dashboard',
        component: DashboardComponent,
        children: [
            {
                name: 'showDashboard',
                path: '',
                component: ShowDashboard
            },
            {
                name: "category",
                path: 'category',
                component: CategoryComponent
            },
            {
                name: "food",
                path: 'food/view',
                component: FoodComponent
            },
            {
                name: "price",
                path: 'food/price/view',
                component: FoodPriceComponent
            },
            {
                name: "contact",
                path: 'contact/view',
                component: ContactComponent
            },
        ]
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