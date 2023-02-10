<template>
  <v-container class="fill-height" fluid
  :style="{
    'background-image': `url(${require('/images/background/hrbg.jpg')})`,
    'background-position': 'center center',
    'background-repeat':  'no-repeat',
    'background-attachment': 'fixed',
    'background-size':  'cover',
  }"
  >
    <v-row align="center" justify="center">
      <v-col cols="12" sm="8" md="4">
        <v-form action="#" @submit.prevent="login">
          <v-card class="elevation-12">
            <v-toolbar color="blue-grey" dark flat>
              <v-toolbar-title>System Security Login</v-toolbar-title>
              <v-spacer />
            </v-toolbar>
            <v-card-text>
              <v-text-field
                v-model="form.user_name"
                label="User_Name"
                name="login"
                type="text"
                color="blue-grey"
              />
              <v-text-field
                v-model="form.password"
                label="Password"
                name="password"
                type="password"
                color="blue-grey"
              />
            </v-card-text>
            <v-card-actions>
              <v-spacer />
              <v-btn
                color="blue-grey"
                class="ma-2 white--text"
                large
                type="submit"
                :loading="loading"
              >
                Login
                <v-icon right dark>mdi-login</v-icon>
              </v-btn>
            </v-card-actions>
            <v-dialog
              v-model="loading"
              hide-overlay
              persistent
              width="300"
            >
              <v-card color="blue-grey" dark>
                <v-card-text>
                  Security Login
                  <v-progress-linear
                    indeterminate
                    color="white"
                    class="mb-0"
                  ></v-progress-linear>
                </v-card-text>
              </v-card>
            </v-dialog>
          </v-card>
        </v-form>
      </v-col>
    </v-row>
    <v-snackbar v-model="snackbar" color="#F44336" top>
      {{ messageError }}
      <v-btn color="white" text @click="snackbar = false">Close</v-btn>
    </v-snackbar>
  </v-container>
</template>

<script>
import axios from "axios";
export default {
  name: "login",
  data() {
    return {
      form:{
        
        user_name: "",
        password: "",
        },
      snackbar: false,
      messageError:"",
      user_name: "",
      password: "",
      loading: false,
    };
  },
  methods: {
    login() {
      this.loading=true;
      axios.get('/sanctum/csrf-cookie').then(response => {
            this.$store
            .dispatch("retrieveToken", this.form).then(response => {
              
              this.loading =  false;
                console.log(response);
              if(response.data.status!=200){
                this.snackbar=true
                this.messageError=response.data.message;
              }else{
                 let routeTo= localStorage.getItem('routeTo');
                 console.log(routeTo)
                if(routeTo&&routeTo!='admin.logout'){
                  this.$router.go({ name: routeTo }).catch(error => {
                    console.info(error.message)
                  });
                }else{
                  this.$router.go({ path: "/dashboard" }).catch(error => {
                    console.info(error.message)
                  });
                }
              }
             
            }).catch(error=>{
                console.log(error)
            });
            
      });
    }
  }
};
</script>
