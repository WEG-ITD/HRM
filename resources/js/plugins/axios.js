export default {
    install(Vue, axios) {
        axios.interceptors.response.use(function (response) {
            if(response.data.status == 401) {
                localStorage.removeItem('access_token');
                localStorage.removeItem('user');
                window.location.href = "/admin/logout";
            }
            return response;
        });
    }   
}