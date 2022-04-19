import { createRouter, createWebHistory } from 'vue-router'

import LoginView from '../views/Login.vue'
import Page2 from '../views/Page2.vue';

const routes = [
    { path: '/', name: 'Login', component: LoginView ,  meta:{ auth: false} },
    { path: '/pagina2', name: 'Page2', component: Page2, meta:{ auth: true} },
    { path: '/:pathMatch(.*)*', component: () => import('../views/404.vue'),  meta:{ auth: false} },

]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
});

router.beforeEach((to, from, next)=>{
    if(to.meta.auth && getCookie("PHPSESSID") === false )
    {
        next({name: 'Login'})
    }
    else
    {
        next();
    }
})


function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(";").shift();
    return false;
}

export default router;