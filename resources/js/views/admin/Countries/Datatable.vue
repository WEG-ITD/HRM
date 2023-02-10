<template>
    <div class="m-1" style="margin:auto">

            <Table
            :loading="loading"
            :headers="headers"
            :items="countries"
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
                <v-dialog
                v-model="editDialog"
                max-width="600"
                >
                    <v-card elevation="5">
                        <v-card-title>
                            Edit Country:  {{editing_Country.name}}?
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
                                <v-btn
                                color="success"
                                @click="editItem(editing_Country)"
                                >
                                Update
                            </v-btn>
                            <v-btn @click="clear">
                                clear
                            </v-btn>
                        </v-card-text>
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
        props:{
            user:Object(),
            countries:Array(),
            loading:Boolean(),
        },
        components: {
            Table,
        },
        validations: {
            form:{
                name_en: { required, maxLength: maxLength(30) },
                name_kh: { required, maxLength: maxLength(30) },
            }
        },
        data () {
            return {
                // countries:[],
                errors:[],
                title:'',
                routeString:'countries',
                headers: [
                    { text: '#', value: 'index', },
                    { text: 'Name En', value: 'name_en' },
                    { text: 'Name Kh', value: 'name_kh' },
                    { text: 'Nationality', value: 'nationality_en' },
                    { text: 'Action',  value: 'actions', sortable: false},
                ],
                //end props for table
                form:{
                    name_en: '',
                    name_kh: '',
                    nationality_en: '',
                },
                overlay:false,
                dialog:false,
                editDialog:false,
                deleting_Country:Object(),
                editing_Country:Object(),
                search: '',

                breadcrumbs:[
                    {
                    text: 'Dashboard',
                    disabled: false,
                    href: '/dashboard',
                    },
                    {
                    text: 'Country',
                    disabled: true,
                    href: '/countries',
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

            nationality_enErrors() {
                const errors = [];
                if (!this.$v.form.nationality_en.$dirty) return errors;
                !this.$v.form.nationality_en.maxLength && errors.push("nationality_en must be at most 30 characters long");
                !this.$v.form.nationality_en.required && errors.push("nationality_en is required.");
                return errors;
            },
        },
        created() {
            // this.initialize();
        },
        methods:{

            editItem (item) {
                axios
                .put("/api/countries/"+item.id,this.form)
                .then(response => {

                    this.$root.Snackbar.show({message: response.data.message,snackColor:response.data.snackColor,})
                    this.$emit('refresh');
                    this.editDialog=false;
                })
                .catch(error => {
                     //console.log(error);
                    if(error.response){
                        this.errors.name = null;
                        this.errors = error.response.data.errors;
                        this.$root.Snackbar.show({message: error.response.data.message,snackColor:'error',})
                        this.$root.Overlay.off();
                    }else{
                        this.$root.Snackbar.show({message: error.message,snackColor:'error',})
                        this.$root.Overlay.off();
                    }
                });
            },
            openEditDialog(item){
                this.editDialog = true;
                this.editing_Country=item;
                this.form.name_en=item.name_en;
                this.form.name_kh=item.name_kh;
                this.form.nationality_en=item.nationality_en;
                this.form.description=item.description;
            },
            clear () {
                this.$v.form.$reset()
                this.form.name_en='';
                this.form.name_kh='';
                this.form.nationality_en='';
                this.form.description='';
            },
        },
         watch:{
            editDialog:function(){
                if(this.editDialog==false){
                    this.clear();
                }
            }
        }
    }

</script>
