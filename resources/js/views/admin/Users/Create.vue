<template>
    <div class="m-1" style="margin:auto">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Add Module-->
        <v-card elevation="5">
          <v-card-title> Add User </v-card-title>
          <v-card-text>
            <div v-if="errors" style="color:red">
              <div v-for="(err,i) in errors" :key="i">
                <div v-for="(e,index) in err" :key="index">{{i}}: {{e}}</div>
              </div>
            </div>
            <form @submit.prevent="submit">
              <v-text-field
                v-model="form.name"
                :error-messages="$v.form.name.$errorMessages"
                :counter="30"
                label="Name"
                required
                @input="$v.form.name.$touch()"
                @blur="$v.form.name.$touch()"
              ></v-text-field>
              <v-text-field
                v-model="form.user_name"
                :error-messages="$v.form.user_name.$errorMessages"
                :counter="7"
                label="Staff Id"
                required
                @input="$v.form.user_name.$touch()"
                @blur="$v.form.user_name.$touch()"
              ></v-text-field>
              <v-text-field
                v-model="form.phone"
                :error-messages="$v.form.phone.$errorMessages"
                :counter="10"
                label="Phone"
                required
                @input="$v.form.phone.$touch()"
                @blur="$v.form.phone.$touch()"
              ></v-text-field>
              <v-text-field
                v-model="form.email"
                :error-messages="$v.form.email.$errorMessages"
                label="E-mail"
                required
                @input="$v.form.email.$touch()"
                @blur="$v.form.email.$touch()"
              ></v-text-field>
              <v-text-field
                v-model="form.password"
                :error-messages="$v.form.password.$errorMessages"
                label="Password"
                required
                :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                :type="show1 ? 'text' : 'password'"
                @click:append="show1 = !show1"
                @input="$v.form.password.$touch()"
                @blur="$v.form.password.$touch()"
              ></v-text-field>
              <v-combobox
                v-model="form.role_id"
                :items="listRole"
                multiple
                item-value="id"
                item-text="name"
                label="Role"
                required
              ></v-combobox>
              <v-btn color="success" class="mr-4" @click="submit">submit</v-btn>
              <v-btn @click="clear">clear</v-btn>
            </form>
          </v-card-text>
        </v-card>
      </div>
    </div>
  </template>

<script>
import { validationMixin } from "vuelidate";
import {
    required,
    maxLength,
    minLength,
    email,
} from "vuelidate/lib/validators";

import axios from "axios";
export default {
    mixins: [validationMixin],
    props: {
        user: Object(),
        // listRole:Array(),
    },
    components: {
    },
    validations: {
        form:{
            name: { required, maxLength: maxLength(30) },
            phone: { required, maxLength: maxLength(10) },
            email: { required, email },
            password: { required,minLength: minLength(8) },
            user_name:{ required, maxLength: maxLength(7) },
        }
    },
    data() {
        return {
            show1:false,
            overlay: false,
            errors: {
                name: null,
            },
            form:{
                name: '',
                user_name: '',
                email: '',
                phone:'',
                password:'',
                role_id:[],
            },
            overlay: false,
            listRole: []
        };
    },
    computed: {
        nameErrors () {
            const errors = []
            if (!this.$v.form.name.$dirty) return errors
            !this.$v.form.name.maxLength && errors.push('Name must be at most 30 characters long')
            !this.$v.form.name.required && errors.push('Name is required.')
            return errors
        },
        phoneErrors () {
            const errors = []
            if (!this.$v.form.phone.$dirty) return errors
            !this.$v.form.phone.maxLength && errors.push('Phone must be at most 10 characters long')
            !this.$v.form.phone.required && errors.push('Phone is required.')
            return errors
        },
        staffErrors () {
            const errors = []
            if (!this.$v.form.user_name.$dirty) return errors
            !this.$v.form.user_name.maxLength && errors.push('User Name must be at most 7 characters long')
            !this.$v.form.user_name.required && errors.push('User Name is required.')
            return errors
        },
        emailErrors () {
            const errors = []
            if (!this.$v.form.email.$dirty) return errors
            !this.$v.form.email.email && errors.push('Must be valid e-mail')
            !this.$v.form.email.required && errors.push('E-mail is required')
            return errors
        },
        passwordErrors () {
            const errors = []
            if (!this.$v.form.password.$dirty) return errors
            !this.$v.form.password.minLength && errors.push('Password must be at least 8 characters long')
            !this.$v.form.password.required && errors.push('Password is required')
            return errors
        },
    },
    created() {
        this.getRoles();
    },
    methods: {
        submit() {
            this.$v.$touch();
            let isFormCorrect = this.$v.form.$invalid;
            if (!isFormCorrect) {
                this.$root.Overlay.on();
                axios
                    .post("/api/users", this.form)
                    .then((response) => {
                        if (response) {
                            this.errors = null;
                            this.$emit('refresh');
                            this.$root.Snackbar.show({message: response.data.message,snackColor:response.data.snackColor,})
                            this.$root.Overlay.off();
                            this.clear();
                        }
                    })
                    .catch((error) => {
                        //console.log(error);
                        if(error.response){
                            this.errors = error.response.data.errors;
                            this.$root.Snackbar.show({message: error.response.data.message,snackColor:'error',})
                            this.$root.Overlay.off();
                        }else{
                            this.$root.Snackbar.show({message: error.message,snackColor:'error',})
                            this.$root.Overlay.off();
                        }

                    });
            }

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
        clear() {
            this.$v.form.$reset();
            this.form.name = "";
            this.form.phone = "";
            this.form.password = "";
            this.form.email = '';
            this.form.password = '';
            this.form.user_name = '';
            this.form.role_id = [];
        },
    },
    watch: {},
};
</script>

