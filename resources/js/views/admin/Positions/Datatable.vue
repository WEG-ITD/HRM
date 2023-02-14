<template>
    <div class="m-1" style="margin:auto">
        <Table
            :loading="loading"
            :headers="headers"
            :items="positions"
            :title="title"
            :routeString="routeString"
            :openEditDialog="openEditDialog"
            @refresh="$emit('refresh')"
        >
            <template v-slot:[`item.index`]="{ index }">
                {{ index + 1 }}
            </template>

        </Table>
        <!--Edit dialog-->
        <v-dialog v-model="editDialog" max-width="600">
            <v-card elevation="5">
                <v-card-title class="text-h6 grey lighten-2 pt-1 pb-1 mt-1 mb-1 pr-0 mr-0">
                    <span>Update Position</span>
                    <v-spacer></v-spacer>
                    <v-btn icon tile @click="editDialog = false">
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                </v-card-title>
                <v-card-text>
                    <form>
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
                            <span style="color: red" v-for="(error, index) in errors.name_en" :key="index">{{ error }}
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
                            <span style="color: red" v-for="(error, index) in errors.name_kh" :key="index">{{ error }}
                            </span>
                        </div>
                        <v-text-field
                            v-model="form.description"
                            :counter="100"
                            label="Description"
                        ></v-text-field>
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
                    <v-btn color="success" @click="editItem(editing_Position)">
                        Update
                    </v-btn>
                    <v-btn @click="clear">
                        clear
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
import axios from "axios";
export default {
    mixins: [validationMixin],
    props: {
        user: Object(),
        positions: Array(),
        loading: Boolean(),
    },
    components: {
        Table,
    },
    validations: {
        form: {
            name_en: { required, maxLength: maxLength(30) },
            name_kh: { required, maxLength: maxLength(30) },
        }
    },
    data() {
        return {
            errors: [],
            title: '',
            routeString: 'positions',
            headers: [
                { text: '#', value: 'index', width: '10px' },
                { text: 'Name En', value: 'name_en' },
                { text: 'Name Kh', value: 'name_kh' },
                // { text: 'Description', value: 'description' },
                { text: 'Action', value: 'actions', sortable: false, width: '120px' },
            ],
            //end props for table
            form: {
                name_en: '',
                name_kh: '',
                description: '',
            },
            overlay: false,
            dialog: false,
            editDialog: false,
            deleting_Position: Object(),
            editing_Position: Object(),
            search: '',
            breadcrumbs: [
                {
                    text: 'Dashboard',
                    disabled: false,
                    href: '/dashboard',
                },
                {
                    text: 'Position',
                    disabled: true,
                    href: '/positions',
                },
            ]
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
    },
    created() {
        // this.initialize();
    },
    methods: {
        editItem(item) {
            axios
                .put("/api/positions/" + item.id, this.form)
                .then(response => {
                    this.$root.Snackbar.show({ message: response.data.message, snackColor: response.data.snackColor, })
                    this.$emit('refresh');
                    this.editDialog = false;
                })
                .catch(error => {
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
            this.editDialog = true;
            this.editing_Position = item;
            this.form.name_en = item.name_en;
            this.form.name_kh = item.name_kh;
            this.form.description = item.description;
        },
        clear() {
            this.$v.form.$reset()
            this.form.name_en = '';
            this.form.name_kh = '';
            this.form.description = '';
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
