
import axios from 'axios';
export default {
    state: {
        token: localStorage.getItem('access_token') || null,
        user: JSON.parse(localStorage.getItem('user')) || null,
        permission: localStorage.getItem('permissions') || null,
        menu: JSON.parse(localStorage.getItem('menu')) || null,
    },
    getters: {
        loggedIn(state) {
        return state.token !== null
        }
    },
    mutations: {
        retrieveToken(state, token) {
            state.token = token
        },
        destroyToken(state) {
            state.token = null
            state.user = null
            state.permission = null
        },
        retrieveUser(state, data) {
            state.user = data.user;
            state.permission=data.permission;
            state.menu=data.menu;
        },
    },
    actions: {
        canAccess(state,to){
            var permission=state.menu;
            for (const element of permission) {
                //console.log(element.link);
                if(element.link==to.fullPath){
                    //console.log('can access');
                    return true;
                }
            };
            
            //console.log('can not access');
            return false;
        },
        destroyToken(context) {
            if (context.getters.loggedIn) {
                
                context.commit('destroyToken')
                localStorage.removeItem('user')
                localStorage.removeItem('access_token')
            }
        },
        retrieveToken(context, credentials) {
            
            // this.listToTree(response.data.data.menu);
            return new Promise((resolve, reject) => {
                axios.post("/api/user/login", {
                user_name: credentials.user_name,
                password: credentials.password,
                })
                .then(response => {
                    const token = response.data.data.token
                    localStorage.setItem('access_token', token)
                    localStorage.setItem('user', JSON.stringify(response.data.data.user))
                    localStorage.setItem('permissions',JSON.stringify(response.data.data.user.permissions))
                    localStorage.setItem('menu',JSON.stringify(response.data.data.menu))
                    context.commit('retrieveToken', token)
                    resolve(response)
                })
                .catch(error => {
                    reject(error)
                })
            })
        },
        
        retrieveUser(context) {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token;
            axios.get('/api/users')
                .then(response => {
                    context.commit('retrieveUser', response.data)
                })
                .catch(error => {
                //console.log(error)
            })
    },
   
  }
}