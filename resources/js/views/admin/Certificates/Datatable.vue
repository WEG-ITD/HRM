<template>
    <div class="m-1" style="margin:auto">
        <Table @refresh="$emit('refresh')" :loading="loading" :headers="headers" :items="certificates" :title="title"
            :routeString="routeString" :openEditDialog="openEditDialog">
            <template v-slot:[`item.index`]="{ index }">
                {{ index + 1 }}
            </template>
            <template v-slot:[`item.is_main`]="{ item }">
                <v-checkbox :input-value="(item.is_main == 1)" disabled value></v-checkbox>
            </template>
            <template v-slot:[`item.have_workflow`]="{ item }">
                <v-checkbox :input-value="(item.have_workflow == 1)" disabled value></v-checkbox>
            </template>
        </Table>
        <!--Edit dialog-->
        <v-dialog
            v-model="editDialog"
            max-width="600"
        >
            <v-card class="rounded-sm">
                <v-card-title class="text-h6 grey lighten-2 pt-1 pb-1 mt-1 mb-1 pr-0 mr-0">
                    <span>Edit Branch/Department</span>
                    <v-spacer></v-spacer>
                    <v-btn icon tile @click="editDialog = false">
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                </v-card-title>
                <p></p>
                <v-card-text class="text--primary">
                    <form @submit.prevent="submit">
                        <v-text-field v-model="form.name_en" :error-messages="nameEnErrors" :counter="30"
                            label="Name_en" required @input="$v.form.name_en.$touch()"
                            @blur="$v.form.name_en.$touch()"></v-text-field>
                        <div v-if="errors.name_en">
                            <span style="color: red" v-for="(error, index) in errors.name_en" :key="index">{{ error }}
                            </span>
                        </div>
                        <v-text-field v-model="form.name_kh" :error-messages="nameKhErrors" :counter="30"
                            label="Name_kh" required @input="$v.form.name_kh.$touch()"
                            @blur="$v.form.name_kh.$touch()"></v-text-field>
                        <div v-if="errors.name_kh">
                            <span style="color: red" v-for="(error, index) in errors.name_kh" :key="index">{{ error }}
                            </span>
                        </div>

                        <v-row>
                            <v-col cols="4">
                                <v-text-field v-model="form.code" :error-messages="codeErrors" :counter="5" label="Code"
                                    required @input="$v.form.code.$touch()" @blur="$v.form.code.$touch()"></v-text-field>
                                <div v-if="errors.code">
                                    <span style="color: red" v-for="(error, index) in errors.code" :key="index">{{ error }}
                                    </span>
                                </div>
                            </v-col>
                            <v-col cols="8">
                                <v-select v-model="form.school_id" :items="schools" item-text="name_en" item-value="id"
                                    label="On School">
                                </v-select>
                                <div v-if="errors.school_id">
                                    <span style="color: red" v-for="(error, index) in errors.school_id" :key="index">{{ error }}
                                    </span>
                                </div>
                            </v-col>
                        </v-row>
                        <!-- <v-text-field v-model="form.description" :counter="100" label="Description"></v-text-field> -->
                        <label>Description</label>
                        <vue-editor v-model="form.description"></vue-editor>
                        <div v-if="errors.name">
                            <span style="color: red" v-for="(error, index) in errors.description" :key="index">{{
                                error
                            }}
                            </span>
                        </div>
                    </form>
                </v-card-text>
                <v-divider class="m-0" style="background-color:#90A4AE; width:100%;"></v-divider>
                <v-card-actions class="pr-2">
                    <v-spacer></v-spacer>
                    <v-btn
                        color="warning"
                        dark
                        @click="editItem(editing_Sidemenu)"
                    >
                        Update
                    </v-btn>
                    <v-btn
                        color="error"
                        dark
                        @click="clear"
                    >
                        Cancel
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
import { validationMixin } from 'vuelidate';
import { required, maxLength, minLength, email } from 'vuelidate/lib/validators';
import Table from "@/components/Table.vue"
import { VueEditor } from 'vue2-quill-editor';
import axios from "axios";
export default {
    mixins: [validationMixin],
    props: {
        user: Object(),
        certificates: Array(),
        modules: Array(),
        loading: Boolean(),
        schools: Array(),
    },
    components: {
        Table,
        VueEditor,
    },
    validations: {
        form: {
            name_en: { required, maxLength: maxLength(30) },
            name_kh: { required, maxLength: maxLength(30) },
            code: { required, maxLength: maxLength(5) },
            school_id: { required },
        }
    },
    data() {
        return {
            // sidemenus:[],
            routeString: "branches",
            types: [
                { id: 0, name: 'Group' },
                { id: 1, name: 'Item' },
            ],

            errors: [],
            title: '',
            routeString: 'branches',
            headers: [
                { text: '#', value: 'index', },
                { text: 'Branch/Department', value: 'branch_id' },
                { text: 'Certificate title', value: 'title' },
                { text: 'Applicable User', value: 'user_id' },
                // { text: 'Description', value: 'description' },
                { text: 'Page Layout', value: 'page_layout' },
                // { text: 'Background Image', value: 'background_image'},
                { text: 'Created', value: 'date' },
                { text: 'Action', value: 'actions', sortable: false },
            ],
            //end props for table
            form: {
                name_en: '',
                name_kh: '',
                code: '',
                description: '',
                school_id: null,
            },
            show1: false,
            dialog: false,
            editDialog: false,
            editing_Sidemenu: Object(),
        }
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
    created() {
        // this.initialize();
    },
    methods: {

        editItem(item) {
            axios
                .put("/api/branches/" + item.id, this.form)
                .then(response => {

                    this.$root.Snackbar.show({ message: response.data.message, snackColor: response.data.snackColor, })
                    this.$emit('refresh');
                    this.editDialog = false;
                })
                .catch(error => {
                    //console.log(error);
                    if (error.response) {
                        this.errors.name = null;
                        this.errors = error.response.data.errors;
                        this.$root.Snackbar.show({ message: error.response.data.message, snackColor: 'error', })
                        this.$root.Overlay.off();
                    } else {
                        this.$root.Snackbar.show({ message: error.message, snackColor: 'error', })
                        this.$root.Overlay.off();
                    }
                });
        },
        openEditDialog(item) {
            this.editing_Sidemenu = item;
            this.editDialog = true;

            this.form.name_en = item.name_en;
            this.form.name_kh = item.name_kh;
            this.form.code = item.code;
            this.form.description = item.description;
            this.form.school_id = item.school_id;

        },
        clear() {
            this.$v.form.$reset();
            this.form.name_en = '';
            this.form.name_kh = '';
            this.form.code = '';
            this.form.description = '';
            this.form.school_id = null;
        },
    },
    watch: {
        editDialog: function () {
            if (this.editDialog == false) {
                this.clear();
            }
        }
    }
}

</script>
<style>
.quill-editor {
    user-select: auto !important;
    -moz-user-select: auto !important;
    -webkit-user-select: auto !important;
    -ms-user-select: auto !important;
  }
</style>
