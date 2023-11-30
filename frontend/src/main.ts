import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import './style.css'
import App from './App.vue'
import HomePage from './views/HomePage.vue'
import ProfilePage from './views/ProfilePage.vue'

const routes = [
    { path: '/', name: 'home', component: HomePage },
    { path: '/users/:id(\\d+)', name: 'user', component: ProfilePage },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

const app = createApp(App);
app.use(router);
app.mount('#app');
