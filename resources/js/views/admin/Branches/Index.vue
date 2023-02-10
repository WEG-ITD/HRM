<template>
    <v-container>
        <v-card elevation="2">
            <v-tabs v-model="tab">
                <v-tabs-slider></v-tabs-slider>
                <v-tab>
                    <v-icon class="mr-2">mdi-view-list </v-icon> Branches List
                </v-tab>
                <v-tab v-if="can.create">
                    <v-icon class="mr-2">mdi-plus-box-multiple </v-icon> Create Branch
                </v-tab>
            </v-tabs>
            <!-- <v-divider></v-divider> -->
            <v-divider style="background-color:#90A4AE; width:100%; position: absolute; top: 31px;"></v-divider>
            <v-tabs-items v-model="tab">
                <v-tab-item>
                    <Datatable :loading="loading" :schools="listSchool" :branches="branches" @refresh="initialize()" />
                </v-tab-item>
                <v-tab-item>
                    <Create :branches="branches" :schools="listSchool" v-on:refresh="initialize()" />
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
            Create
        },
        data: () => ({
            loading:true,
            listSchool:[],
            branches:[],
            can:[],
            tab: null,
        }),
        beforeMount() {
            this.initialize();
        },
        created() {
            console.log('asdf');
            this.user = this.$store.state.auth.user;
            this.initialize();
        },
        methods:{
            initialize() {
                return new Promise((resolve, reject) => {
                    axios
                    .get("/api/branches")
                    .then(response => {
                        this.branches = response.data.data;
                        this.can = response.data.can;
                        this.listSchool=response.data.schools;
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


        },

    }
</script>
