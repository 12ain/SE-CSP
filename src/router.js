import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import store from './store'

Vue.use(Router)

const router = new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/admin',
      name: 'admin',
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import(/* webpackChunkName: "about" */ './views/Admin.vue'),
      // meta: { requireAuth: true },
    }
  ]
})
router.beforeEach((to, from, next) => {
  if (to.meta.requireAuth) {
    if (store.state.auth) {
      next();
    }
  } else {
    next();
  }
})

export default router;
