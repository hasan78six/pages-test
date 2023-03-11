require('./bootstrap');
import { createApp } from 'vue';
import App from './app.vue';
import router from './router.js';

const app = createApp(App).use(router).mount("#app");
