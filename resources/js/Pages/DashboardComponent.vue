<template>
   <div class="tohfa-edu-dashboard">
        <SidebarComponent />
        <div class="content-wrapper">
            <NavbarComponent />
            <div class="content">
                <div class="container">
                    <router-view />
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import '../../css/dashboard.css';

import NavbarComponent from '../components/dashboard/layouts/NavbarComponent.vue';
import SidebarComponent from '../components/dashboard/layouts/SidebarComponent.vue';

export default {
    name: "DashboardComponent",
    components: {
        NavbarComponent,
        SidebarComponent
    }
}
</script>