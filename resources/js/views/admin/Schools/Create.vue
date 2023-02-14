<template>
    <div class="m-1" style="margin:auto">
        <div class="p-3 m-3">
            <!-- Add School-->
            <template>
                <form @submit.prevent="submit">
                    <v-row>
                        <v-col cols="6" class="p-0 m-0">
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
                        </v-col>
                        <v-col cols="6" class="p-0 m-0">
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
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="12" class="p-0 m-0">
                            <v-text-field
                                v-model="form.code"
                                :error-messages="codeErrors"
                                :counter="5"
                                label="Code"
                                required
                                @input="$v.form.code.$touch()"
                                @blur="$v.form.code.$touch()"
                            ></v-text-field>
                            <div v-if="errors.code">
                                <span
                                    style="color: red"
                                    v-for="(error, index) in errors.code"
                                    :key="index"
                                    >{{ error }}
                                </span>
                            </div>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="12" class="p-0 m-0">
                            <label>Description</label>
                            <vue-editor
                                v-model="form.description"
                                :editorToolbar="customToolbar"
                            ></vue-editor>
                            <div v-if="errors.name">
                                <span
                                    style="color: red"
                                    v-for="(error, index) in errors.description"
                                    :key="index"
                                    >{{ error }}
                                </span>
                            </div>
                            <p></p>
                        </v-col>
                    </v-row>
                </form>
                <v-btn color="success" @click="submit"> Add </v-btn>
                <v-btn @click="clear"> clear </v-btn>
            </template>
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
import { VueEditor } from 'vue2-quill-editor';
import axios from "axios";
export default {
    mixins: [validationMixin],
    props: {
        user: Object(),
    },
    components: {
        Snackbar,
        VueEditor
    },
    validations: {
        form: {
            name_en: { required, maxLength: maxLength(100) },
            name_kh: { required, maxLength: maxLength(100) },
            code: { required, maxLength: maxLength(10) },
        },
    },
    data() {
        return {
            overlay: false,
            errors: {
                name_en: null,
                name_kh: null,
                code: null,
            },
            title: "School",
            snackbar: false,
            snackColor: "",
            message: "",
            form: {
                name_en: "",
                name_kh: '',
                code : '',
                description : '',
            },
            overlay: false,
            customToolbar: [
                [{ header: [false, 1, 2, 3, 4, 5, 6] }],
                ["bold", "italic", "underline", "strike"], // toggled buttons
                [
                    { align: "" },
                    { align: "center" },
                    { align: "right" },
                    { align: "justify" }
                ],
                ["blockquote", "code-block"],
                [{ list: "ordered" }, { list: "bullet" }, { list: "check" }],
                [{ indent: "-1" }, { indent: "+1" }], // outdent/indent
                [{ color: [] }, { background: [] }], // dropdown with defaults from theme
                ["link", "image", "video"],
                ["clean"] // remove formatting button
            ],
        };
    },
    computed: {
        nameEnErrors() {
            const errors = [];
            if (!this.$v.form.name_en.$dirty) return errors;
            !this.$v.form.name_en.maxLength && errors.push("Name en must be at most 100 characters long");
            !this.$v.form.name_en.required && errors.push("Name en is required.");
            return errors;
        },
        nameKhErrors() {
            const errors = [];
            if (!this.$v.form.name_kh.$dirty) return errors;
            !this.$v.form.name_kh.maxLength && errors.push("Name kh must be at most 100 characters long");
            !this.$v.form.name_kh.required && errors.push("Name kh is required.");
            return errors;
        },

        codeErrors() {
            const errors = [];
            if (!this.$v.form.code.$dirty) return errors;
            !this.$v.form.code.maxLength && errors.push("code must be at most 30 characters long");
            !this.$v.form.code.required && errors.push("code is required.");
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
                .post("/api/schools", this.form)
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
            this.form.code='';
            this.form.description='';
        },
    },
    watch: {},
};
</script>
<style>
    #editor .quill-editor .ql-container {
        height: 60%
    }
</style>
