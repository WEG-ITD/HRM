import Sidemenu from '../../views/admin/Sidemenus/Index.vue'
import store from '@/store/modules/auth.js'
export default [
    {
        path: '/admin/sidemenus',
        name: 'admin.sidemenus',
        component: Sidemenu,
        meta: {
            requiresAuth: true,
        },
        beforeEnter:(to,from,next)=>{
            if(store.actions.canAccess(store.state,to)){next();}
        }
    },
]
