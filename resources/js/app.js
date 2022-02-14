require('./bootstrap');

import { createApp } from 'vue';
import router from "./router";
import Lots from "./components/Lots.vue";

createApp({
    components: {
        Lots,
    }
}).use(router).mount('#app');
