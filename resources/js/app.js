
window.Vue = require('vue').default;
import MainRouter from 'vue-router';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import Vue from 'vue';
import axios from "axios";
import router from './router';
import { store } from './store';
import permission from './plugins/permissions';
import AxiosInterceptors from './plugins/axios';
import Vuelidate from 'vuelidate';
import moment from 'moment';
import { reduce } from 'lodash'
import colors from 'vuetify/lib/util/colors'
export default new Vuetify({
  theme: {
      dark:(localStorage.getItem('theme_dark'))?(localStorage.getItem('theme_dark')=='true'):false,
      themes: {
          light: {
              // primary:'#0d8c20',
              primary: '#3f51b5',
              secondary: '#b0bec5',
              anchor: '#4B0082',
          },
          dark:{
              // primary:colors.green.darken1,
              primary: colors.lightBlue.darken1,
              secondary: colors.green.lighten4,
              anchor: colors.indigo.base,
          }
      },
  },
})


//use vue


Vue.use(MainRouter, router, store);
Vue.use(Vuetify);
Vue.use(Vuelidate);
Vue.use(permission,store);
Vue.use(AxiosInterceptors,axios);
//vue compoment
Vue.component('Admin', require('./App.vue').default);

Vue.filter('uppercase',function(value){
  return value.toUpperCase();
});
Vue.filter('currency',function(value){
  const formatter = new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 2
  })
  return formatter.format(value);
});
Vue.filter('formatDateWithTime', function(value) {
  if (value) {
    return moment(String(value)).format('DD/MM/YYYY h:mm a')
  }
});
Vue.filter('formatDateOnly', function(value) {
  if (value) {
    return moment(String(value)).format('DD/MM/YYYY')
  }
});
//axios header
axios.defaults.headers.common['Authorization'] = "Bearer " + store.state.auth.token
axios.defaults.headers.post['Content-Type'] = 'application/json';
axios.interceptors.response.use(function (response) {
  // Any status code that lie within the range of 2xx cause this function to trigger
  
  // Do something with response data
  return response;
}, function (error) {
      if(error.response.status===401){
          store.dispatch("destroyToken").then(response => {
              //console.log(response);
              router.push({ path: "/admin/login" }).catch(error => {
                  console.info(error)
              });
          });
      }
  // Any status codes that falls outside the range of 2xx cause this function to trigger
  // Do something with response error  
  return Promise.reject(error);
});
//router
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
      if (!store.getters.loggedIn) {
        next({
          name: 'admin.login',
        })
      } else {
        next()
      }
    } else if (to.matched.some(record => record.meta.requiresVisitor)) {
      if (store.getters.loggedIn) {
        next({
          name: 'admin.dashboard',
        })
      } else {
        next()
      }
    } else {
      next()
    }
});
//init vue
new Vue({
    vuetify: new Vuetify(),
    router,
    store,
}).$mount('#admin');
