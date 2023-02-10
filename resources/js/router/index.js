
import VueRouter from 'vue-router';
import AdminAuthentication from './admin/auth';
import Admin from './admin/user.js';
import Module from './admin/module.js';
import Sidemenu from './admin/sidemenu.js';

const routes = [
  ...Admin,
  ...AdminAuthentication,
  ...Module,
  ...Sidemenu,
]

const router = new VueRouter({
  mode: "history",
  base: __dirname,
  routes,
  base: process.env.BASE_URL
});

export default router;
