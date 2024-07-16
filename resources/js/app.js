/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

// bootstrap 
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"

const app = createApp({});

import AppComponent from './Pages/AppComponent.vue';
import router from './router';
import { library } from "@fortawesome/fontawesome-svg-core";
import { fas } from "@fortawesome/free-solid-svg-icons";
import { fab } from "@fortawesome/free-brands-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
// axios
import axios from 'axios'
import VueAxios from 'vue-axios'

library.add(fas, fab)

const vuetify = createVuetify({
    components,
    directives,
})


app.component('fa', FontAwesomeIcon).component('app-component', AppComponent);


app.use(VueAxios, axios).use(vuetify).use(router).mount('#app');
