import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Contact from '../views/Contact.vue'
import ItemDetails from '../views/ItemDetails'
import Auth from '../views/Auth'
import Cart from '../views/Cart';
import Checkout from '../views/Checkout';
import Shop from '../views/Shop';
import Category from '../views/Category';

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
    path:'/details/:id',
    name:'details',
    component: ItemDetails
  },
  {
    path:'/auth',
    name: 'auth',
    component: Auth
  },
  {
    path:'/cart',
    name: 'cart',
    component: Cart
  },
  {
    path:'/checkout',
    name: 'checkout',
    component: Checkout
  },
  {
    path:'/shop',
    name:'shop',
    component:Shop
  },
  {
    path:'/category/:category',
    name:'category',
    component:Category
  }
  
]

const router = createRouter({
  history: createWebHashHistory(),
  routes,
  scrollBehavior() {
    // Always scroll to top when navigating to a new route
    return { top: 0 };
  }
})

export default router
