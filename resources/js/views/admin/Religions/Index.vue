<template>
       <v-container>
        <v-card elevation="2">
         <!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <v-breadcrumbs
            :items="breadcrumbs"
            divider="/"
            ></v-breadcrumbs>
        </h2> -->
        <v-tabs v-model="tab">
            <v-tabs-slider ></v-tabs-slider>
            <v-tab>
                <v-icon class="mr-2">mdi-view-list </v-icon> Religion List
            </v-tab>
            <v-tab v-if="can.create">
                <v-icon class="mr-2">mdi-plus-box-multiple </v-icon> Create Religion
            </v-tab>
        </v-tabs>
        <v-divider style="background-color:#90A4AE; width:100%; position: absolute; top: 31px;"></v-divider>
        <v-tabs-items v-model="tab">
            <v-tab-item>
                <Datatable :loading="loading" :religions="religions" @refresh="initialize()" />
            </v-tab-item>
             <v-tab-item>
                <Create v-on:refresh="initialize()"/>
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
            religions:[],
            can:[],
            tab: null,
            breadcrumbs:[
                {
                text: 'Dashboard',
                disabled: false,
                href: '/dashboard',
                },
                {
                text: 'Religion',
                disabled: true,
                href: '/religions',
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
                    .get("/api/religions")
                    .then(response => {

                        this.religions = response.data.data;

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
