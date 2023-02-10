<template>
    <v-container>
        <v-card elevation="2">
            <v-tabs v-model="tab">
                <v-tabs-slider></v-tabs-slider>
                <v-tab>
                    <v-icon class="mr-2">mdi-view-list </v-icon> School List
                </v-tab>
                <v-tab v-if="can.create">
                    <v-icon class="mr-2">mdi-plus-box-multiple </v-icon> Create School
                </v-tab>
            </v-tabs>
            <v-divider style="background-color:#90A4AE; width:100%; position: absolute; top: 31px;"></v-divider>
            <v-tabs-items v-model="tab">
                <v-tab-item>
                    <Datatable :loading="loading" :schools="schools" @refresh="initialize()" />
                </v-tab-item>
                <v-tab-item>
                    <Create v-on:refresh="initialize()" />
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
            schools:[],
            can:[],
            tab: null,
            breadcrumbs:[
                {
                text: 'Dashboard',
                disabled: false,
                href: '/dashboard',
                },
                {
                text: 'Module',
                disabled: true,
                href: '/schools',
                },
            ]
        }),
        created() {
            //console.log(this.$api_url)
            this.initialize();
        },
        methods:{
            initialize() {
                //console.log('123');
                  return new Promise((resolve, reject) => {
                    axios
                    .get("/api/schools")
                    .then(response => {

                        this.schools = response.data.data;

                        this.can = response.data.can;
                        //console.log(response);
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
