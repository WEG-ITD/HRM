import Login from '../../views/admin/auth/Login.vue';
import Logout from '../../views/admin/auth/Logout.vue';
import DashboardAdmin from '../../views/admin/Dashboard.vue';

export default [
      {
        path: "/",
        component: DashboardAdmin,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/admin/logout',
        name: 'admin.logout',
        component: Logout,
        meta: {
          requiresAuth: true,
        }
    },
    {
        path: '/admin/login',
        name: 'admin.login',
        component: Login,
        meta: {
          requiresVisitor: true,
        }
    }
]