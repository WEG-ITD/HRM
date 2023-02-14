<template>
    <div class="m-1" style="margin:auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Add Module-->
            <div>
                <!-- <v-card-title style="color: '#DF9D0E'""><v-icon>mdi-home-assistant</v-icon> School Details <v-divider></v-divider></v-card-title> -->
                <!-- --------------------------school Details----------------------- -->
                <!-- <v-card-title style="padding-bottom: 0">
                    <v-icon medium left color="#DF9D0E">mdi-home-assistant</v-icon>
                    <span class="title font-weight-light" style="color:#DF9D0E">School Details</span>
                    <v-divider style="background-color:#DF9D0E; width:100%;"></v-divider>
                </v-card-title> -->
                <v-card-text>
                    <div v-if="errors" style="color:red">
                        <span v-for="(err,i) in errors" :key="i">

                            <span style="display:block" v-for="e,index in err" :key="index">
                               {{i}}: {{e}}
                            </span>
                        </span>
                    </div>
                    <v-form @submit.prevent="submit">
                        <v-text-field
                                    v-model="form.name_en"
                                    :error-messages="nameEnErrors"
                                    :counter="100"
                                    label="Name en"
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
                                    :counter="100"
                                    label="Name kh"
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
                                <v-row>
                                    <v-col cols="4">
                                        <v-text-field
                                            v-model="form.code"
                                            :error-messages="codeErrors"
                                            :counter="5"
                                            label="Code"
                                            required
                                            @input="$v.form.code.$touch()"
                                            @blur="$v.form.code.$touch()"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="8">
                                        <v-select
                                            v-model="form.school_id"
                                            :items="schools"
                                            item-text="name_en"
                                            item-value="id"
                                            label="School">
                                        </v-select>
                                        <div v-if="errors.school_id">
                                            <span
                                                style="color: red"
                                                v-for="(error, index) in errors.school_id"
                                                :key="index"
                                                >{{ error }}
                                            </span>
                                        </div>
                                    </v-col>
                                </v-row>
                                <div v-if="errors.code">
                                    <span
                                        style="color: red"
                                        v-for="(error, index) in errors.code"
                                        :key="index"
                                        >{{ error }}
                                    </span>
                                </div>
                                <label>Description</label>
                                <vue-editor label="Description" v-model="form.description" :editorToolbar="customToolbar"></vue-editor>
                                <div v-if="errors.name">
                                    <span
                                        style="color: red"
                                        v-for="(error, index) in errors.description"
                                        :key="index"
                                        >{{ error }}
                                    </span>
                                </div>
                    </v-form>
                    <v-spacer></v-spacer>
                    <p></p>
                    <v-btn color="success" @click="submit"> Add </v-btn>
                    <v-btn @click="clear"> clear </v-btn>
                </v-card-text>
            </div>
        </div>
    </div>
</template>

<script>
import { validationMixin } from "vuelidate";
import { VueEditor } from 'vue2-quill-editor';
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
        branches: Object(),
        schools: Array(),
    },
    components: {
        VueEditor,
    },
    validations: {
        form: {
            name_en: { required, maxLength: maxLength(100) },
            name_kh: { required, maxLength: maxLength(100) },
            code: { required, maxLength: maxLength(5) },
            school_id: { required },
        },
    },
    data() {
        return {
            errors: [],
            form: {
                name_en: "",
                name_kh: '',
                code : '',
                description : '',
                school_id : null,
            },
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
                axios.post("/api/branches", this.form)
                    .then((response) => {
                        //console.log(response);
                        if (response) {
                            this.$emit("refresh");
                            this.errors.name = null;
                            this.$root.Snackbar.show({ message: response.data.message, snackColor: response.data.snackColor, })
                            this.$root.Overlay.off();
                            this.clear();
                        }
                    })
                    .catch((error) => {
                        //console.log(error);
                        if (error.response) {
                            this.errors = error.response.data.errors;
                            this.$root.Snackbar.show({ message: error.response.data.message, snackColor: 'error', })
                            this.$root.Overlay.off();
                        } else {
                            this.$root.Snackbar.show({ message: error.message, snackColor: 'error', })
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
            this.form.school_id = null;
        },
    },
    watch: {},
};
</script>
