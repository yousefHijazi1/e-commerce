import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Contact from '../views/Contact.vue'
import ItemDetails from '../views/ItemDetails'
import Auth from '../views/Auth'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/contact',
    name: 'contact',
    component: Contact
  },
  {
    path:'/details',
    name:'details',
    component: ItemDetails
  },
  {
    path:'/auth',
    name: 'auth',
    component: Auth
  },
  
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
