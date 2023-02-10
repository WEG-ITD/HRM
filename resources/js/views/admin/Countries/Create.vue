<template>
    <div class="m-1" style="margin:auto">
        <div style="max-width:600px;" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Add Country-->
            <v-card elevation="5">
                <v-card-title> Add Country </v-card-title>
                <v-card-text>
                    <form @submit.prevent="submit">
                        <v-text-field
                            v-model="form.name_en"
                            :error-messages="nameEnErrors"
                            :counter="30"
                            label="Name_en"
                            required
                            @input="$v.form.name_en.$touch()"
                            @blur="$v.form.name_en.$touch()"
                        ></v-text-field>
                        <div v-if="errors.name_en">
                            <span
                                style="color: red"
                                v-for="(error, index) in errors.name_en"
                                :key="index"
                                >{{ error }}
                            </span>
                        </div>
                        <v-text-field
                            v-model="form.name_kh"
                            :error-messages="nameKhErrors"
                            :counter="30"
                            label="Name_kh"
                            required
                                @input="$v.form.name_kh.$touch()"
                                @blur="$v.form.name_kh.$touch()"
                            ></v-text-field>
                            <div v-if="errors.name_kh">
                                <span
                                    style="color: red"
                                    v-for="(error, index) in errors.name_kh"
                                    :key="index"
                                    >{{ error }}
                                </span>
                            </div>
                            <v-text-field
                                v-model="form.nationality_en"
                                :counter="5"
                                label="Nationality_en"
                            ></v-text-field>
                            <div v-if="errors.nationality_en">
                                <span
                                    style="color: red"
                                    v-for="(error, index) in errors.nationality_en"
                                    :key="index"
                                    >{{ error }}
                                </span>
                            </div>
                             
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
        Snackbar,
    },
    validations: {
        form: {
            name_en: { required, maxLength: maxLength(30) },
            name_kh: { required, maxLength: maxLength(30) },
        },
    },
    data() {
        return {
            overlay: false,
            errors: {
                name_en: null,
                name_kh: null,
            },
            title: "Country",
            snackbar: false,
            snackColor: "",
            message: "",
            form: {
                name_en: "",
                name_kh: '',
                nationality_en:''
            },
            overlay: false,
        };
    },
    computed: {
        nameEnErrors() {
            const errors = [];
            if (!this.$v.form.name_en.$dirty) return errors;
            !this.$v.form.name_en.maxLength && errors.push("Name_en must be at most 30 characters long");
            !this.$v.form.name_en.required && errors.push("Name_en is required.");
            return errors;
        },
        nameKhErrors() {
            const errors = [];
            if (!this.$v.form.name_kh.$dirty) return errors;
            !this.$v.form.name_kh.maxLength && errors.push("Name_kh must be at most 30 characters long");
            !this.$v.form.name_kh.required && errors.push("Name_kh is required.");
            return errors;
        },
        
   
    },
    methods: {
        submit() {
            this.$v.$touch();
            let isFormCorrect = this.$v.form.$invalid;
            // you can show some extra alert to the user or just leave the each field to show it's `$errors`.
            if (!isFormCorrect) {
                this.$root.Overlay.on();
                axios
                .post("/api/countries", this.form)
                .then((response) => {
                    //console.log(response);
                    if (response) {
                        this.$emit("refresh");
                      
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
            this.form.name_en='';
            this.form.name_kh='';
            this.form.nationality_en='';
            this.form.description='';
        },
    },
    watch: {},
};
</script>
