<template>
    <v-container>
      <v-card elevation="2">
        <v-tabs v-model="tab">
          <v-tabs-slider></v-tabs-slider>
          <v-tab>
            <v-icon class="mr-2">mdi-view-list </v-icon> Certificate List
          </v-tab>
          <v-tab v-if="can.create">
            <v-icon class="mr-2">mdi-plus-box-multiple </v-icon> Create Certificate
          </v-tab>
        </v-tabs>
        <v-divider style="background-color:#90A4AE; width:100%; position: absolute; top: 31px;"></v-divider>
        <v-tabs-items v-model="tab">
          <v-tab-item>
            <Datatable :loading="loading" :schools="listSchool" :certificates="certificates" @refresh="initialize()" />
          </v-tab-item>
          <v-tab-item>
            <Create :certificates="certificates" :schools="listSchool" v-on:refresh="initialize()" />
          </v-tab-item>
        </v-tabs-items>
      </v-card>
    </v-container>
  </template>
  <script>
  import Datatable from "./Datatable.vue";
  import Create from "./Create.vue";
  import { VueEditor } from "vue2-quill-editor";
  import axios from "axios";
  
  export default {
    components: {
      Datatable,
      Create,
      VueEditor,
    },
    data: () => ({
      loading: true,
      listSchool: [],
      certificates: [],
      can: [],
      tab: null,
    }),
    beforeMount() {
      this.initialize();
    },
    created() {
      this.user = this.$store.state.auth.user;
    },
    methods: {
      async initialize() {
        try {
          const response = await axios.get("/api/certificate-templates");
          this.certificates = response.data.data;
          this.can = response.data.can;
          this.listSchool = response.data.schools;
          setTimeout(() => {
            this.loading = false;
          }, 100);
          return response;
        } catch (error) {
          console.error(error);
          throw error;
        }
      },
    },
  };
  </script>