import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Contact from '../views/Contact.vue'
import ItemDetails from '../views/ItemDetails'
import Auth from '../views/Auth'
import Cart from '../views/Cart';
import Checkout from '../views/Checkout';
import Shop from '../views/Shop';
import Category from '../views/Category';
import Order from '../views/Order';

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
    path:'/create-order/',
    name:'order',
    component: Order
  },
  {
    path:'/auth',
    name: 'auth',
    component: Auth
  },
  {
    path: '/cart/:userId',
    name: 'cart',
    component: Cart,
    beforeEnter: (to, from, next) => {
      const userId = localStorage.getItem('auth_id');
      if (!userId) {
        // If auth_id is not found, redirect to authentication page
        next('/auth');
      } else {
        // If auth_id is found, proceed to the cart route with the userId
        next();
      }
    }
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
    component:Category,
    
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
