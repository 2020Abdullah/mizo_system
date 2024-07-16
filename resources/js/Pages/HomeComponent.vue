<template>
    <v-main class="homePage">
        <!-- header section -->
        <HeaderComponent />
        <!-- main content -->
        <MenuComponent />
        <!-- Footer Section -->
        <FooterComponent/>
    </v-main>
</template>

<script>
import '../../css/home.css';

import HeaderComponent from '../components/Home/HeaderComponent.vue';
import FooterComponent from '../components/Home/FooterComponent.vue';
import MenuComponent from '../components/Home/MenuComponent.vue';

export default {
    name: "HomeComponent",
    components: {
        HeaderComponent,
        FooterComponent,
        MenuComponent
    }
}
</script>