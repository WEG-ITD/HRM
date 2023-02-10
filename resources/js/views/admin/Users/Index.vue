<template>
    <v-container>
        <v-card elevation="2">
        <v-tabs v-model="tab">
            <v-tabs-slider ></v-tabs-slider>
            <v-tab>
                <v-icon class="mr-2">mdi-view-list </v-icon> User List
            </v-tab>
            <v-tab v-if="can.create">
                <v-icon class="mr-2">mdi-plus-box-multiple </v-icon> Create new
            </v-tab>
        </v-tabs>
        <v-divider style="background-color:#90A4AE; width:100%; position: absolute; top: 31px;"></v-divider>
        <v-tabs-items  style="background:unset" v-model="tab">
            <v-tab-item>
                <Datatable :loading="loading" :listRole="listRole" :users="users" @refresh="initialize()"/>
            </v-tab-item>
            <v-tab-item>
                <Create :listRole="listRole" @refresh="initialize()"/>
            </v-tab-item>
        </v-tabs-items>
        </v-card>
    </v-container>
</template>
<script>
import Datatable from "./Datatable.vue";
import Create from "./Create.vue";
import axios from "axios";
export default {
    components: {
        Datatable,
        Create,
    },
    data: () => ({
        tab: null,
        loading:true,
        listRole:[],
        users:[],
        can:[],
    }),
     beforeMount() {
        this.initialize();
    },
    created() {
        let IsCreate = this.$route.params.create;
        this.user = this.$store.state.auth.user;
        this.initialize();
        this.getRoles();
    },
    methods: {
        initialize() {
            this.getRoles();
            return new Promise((resolve, reject) => {
                axios
                    .get("/api/users")
                    .then(response => {
                        this.users = response.data.data;
                        this.can = response.data.can;
                        setTimeout(() => {
                            this.loading = false;
                            resolve(response);
                        }, 100);
                    })
                    .catch(error => {
                        reject(error);
                    });
            });
        },
        getRoles() {
            return new Promise((resolve, reject) => {
                axios
                    .get("/api/roles")
                    .then(response => {

                        //console.log('asd');
                        //console.log(response.data.data);
                        this.listRole = response.data.data.roles;
                    })
                    .catch(error => {
                        reject(error);
                    });
            });
        },
    }
}
</script>
