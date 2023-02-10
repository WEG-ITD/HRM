<template>
    <div class="m-1" style="margin:auto">
        <div style="max-width:600px;" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Add Role-->
            <v-card elevation="5">
                <v-card-title> Add Role </v-card-title>
                <v-card-text>
                    <form @submit.prevent="submit">
                        <v-text-field
                            v-model="form.name"
                            :error-messages="nameErrors"
                            :counter="30"
                            label="Name"
                            required
                            @input="$v.form.name.$touch()"
                            @blur="$v.form.name.$touch()"
                        ></v-text-field>
                        <div v-if="errors.name">
                            <span
                                style="color: red"
                                v-for="(error, index) in errors.name"
                                :key="index"
                                >{{ error }}
                            </span>
                        </div>
                        <v-text-field
                            v-model="form.value"
                            :counter="30"
                            label="Value"
                            required
                        ></v-text-field>
                      
                    </form>
                    <v-btn color="success" @click="submit"> Add </v-btn>
                    <v-btn @click="clear"> clear </v-btn>
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
import Snackbar from "@/components/Snackbar";

import axios from "axios";
export default {
    mixins: [validationMixin],
    props: {
        user: Object(),
    },
    components: {
    },
    validations: {
        form: {
            name: { required, maxLength: maxLength(30) },
        },
    },
    data() {
        return {
            overlay: false,
            errors: {
                name: null,
            },
            title: "Role",
            form: {
                name: "",
                value: "",
            },
        };
    },
    computed: {
        nameErrors() {
            const errors = [];
            if (!this.$v.form.name.$dirty) return errors;
            !this.$v.form.name.maxLength && errors.push("Name must be at most 30 characters long");
            !this.$v.form.name.required && errors.push("Name is required.");
            return errors;
        },
    },
    methods: {
        submit() {
            this.$v.$touch();
            let isFormCorrect = this.$v.form.$invalid;
            if (!isFormCorrect) {
                this.$root.Overlay.on();
                axios
                .post("/api/roles", this.form)
                .then((response) => {
                    //console.log(response);
                    if (response) {
                        this.$emit("refresh");
                        this.errors.name = null;
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
        clear() {
            this.$v.form.$reset();
            this.form.name = "";
            this.form.value = "";
        },
    },
    watch: {},
};
</script>
