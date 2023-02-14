import Dashboard from '../../views/admin/Dashboard.vue'
import User from '../../views/admin/Users/Index.vue'
import CreateUser from '../../views/admin/Users/Create.vue'
import Role from '../../views/admin/Roles/Index.vue'
import Permission from '../../views/admin/Roles/Permission.vue'
import Branch from '../../views/admin/Branches/Index.vue'
import School from '../../views/admin/Schools/Index.vue'
import Country from '../../views/admin/Countries/Index.vue'
import Religion from '../../views/admin/Religions/Index.vue'
import Language from '../../views/admin/Languages/Index.vue'
import Position from '../../views/admin/Positions/Index.vue'
export default [
    {
        path: '/admin',
        meta: {
          requiresAuth: true,
        }
    },
    {
        path: '/admin/dashboard',
        name: 'admin.dashboard',
        component: Dashboard,
        meta: {
          requiresAuth: true,
          permission:'dashboard'
        }
    },
    {
        path: '/admin/users',
        name: 'admin.users',
        component: User,
        meta: {
            requiresAuth: true,
            permission:'user'
        }
    },
    // {
    //     path: '/admin/users/:create',
    //     name: 'admin.users',
    //     component: CreateUser,
    //     meta: {
    //         requiresAuth: true,
    //         permission:'user'
    //     }
    // },
    {
        path: '/admin/roles',
        name: 'admin.roles',
        component: Role,
        meta: {
            requiresAuth: true,
            permission:'role'
        }
    },
    {
        path: '/admin/permission/:role',
        name: 'admin.permission',
        component: Permission,
        meta: {
            requiresAuth: true,
            permission:'permission'
        }
    },
    {
        path: '/admin/branches',
        name: 'admin.branches',
        component: Branch,
        meta: {
            requiresAuth: true,
            permission: 'branch',
        }
    },
    {
        path: '/admin/schools',
        name: 'admin.schools',
        component: School,
        meta: {
            requiresAuth: true,
            permission: 'School',
        }
    },
    {
        path: '/admin/positions',
        name: 'admin.positions',
        component: Position,
        meta: {
            requiresAuth: true,
            permission: 'Position',
        }
    },
    {
        path: '/admin/countries',
        name: 'admin.countries',
        component: Country,
        meta: {
            requiresAuth: true,
            permission: 'Country',
        }
    },
    {
        path: '/admin/religions',
        name: 'admin.religions',
        component: Religion,
        meta: {
            requiresAuth: true,
            permission: 'Religion',
        }
    },
    {
        path: '/admin/languages',
        name: 'admin.languages',
        component: Language,
        meta: {
            requiresAuth: true,
            permission: 'Language',
        }
    },
]
