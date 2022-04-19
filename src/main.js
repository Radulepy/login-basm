import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import VueSession from 'vue-session'

import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"


createApp(App)
    .use(router)
    .use(VueSession)
    .mount('#app')
