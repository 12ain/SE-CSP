import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import axios from 'axios'

import iView from 'iview'
import 'iview/dist/styles/iview.css'
import https from './utils/https.js'

Vue.config.productionTip = false
Vue.prototype.axios = axios;

Vue.use(iView);

new Vue({
  router,
  store,
  axios,
  https,
  render: h => h(App)
}).$mount('#app')
