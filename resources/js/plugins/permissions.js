export default {
    install(Vue, options) {
        Vue.prototype.$systemPermission = function(args) {
            if(options.state.auth.permission) {
              if(JSON.parse(options.state.auth.permission.includes(args))) {
                return true;
              }
            }
        }
      }
    }