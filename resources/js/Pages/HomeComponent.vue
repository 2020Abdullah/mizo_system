<template>
    <v-main class="homePage">
        <div class="loading" v-if="loading == true">
            <div class="spinner-border text-warning" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
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
    data(){
        return {
            loading: true,
        }
    },
    mounted(){
        setTimeout(() => {
            this.loading = false
        }, 1000)
    },
    components: {
        HeaderComponent,
        FooterComponent,
        MenuComponent
    }
}
</script>