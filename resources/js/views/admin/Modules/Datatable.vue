<template>
    <div class="m-1" style="margin:auto">

            <Table
            :loading="loading"
            :headers="headers"
            :items="modules"
            :title="title"
            :routeString="routeString"
            :openEditDialog="openEditDialog"
            >
                <template v-slot:[`item.index`]="{ index }">
                        {{ index + 1 }}
                </template>
                <template v-slot:[`item.is_main`]="{ item }">
                    <v-checkbox
                        :input-value="(item.is_main==1)"
                        disabled
                        value
                    ></v-checkbox>
                </template>
                    <template v-slot:[`item.have_workflow`]="{ item }">
                    <v-checkbox
                        :input-value="(item.have_workflow==1)"
                        disabled
                        value
                    ></v-checkbox>
                </template>
            </Table>
                <!--Edit dialog-->
                <v-dialog
                v-model="editDialog"
                max-width="600"
                >
                    <v-card elevation="5">
                        <v-card-title>
                            Edit Module:  {{editing_Module.name}}?
                        </v-card-title>
                        <v-card-text>
                            <form>
                                <v-text-field
                                    v-model="form.name"
                                    :error-messages="nameErrors"
                                    :counter="30"
                                    label="Name"
                                    required
                                    @input="$v.form.name.$touch()"
                                    @blur="$v.form.name.$touch()"
                                ></v-text-field>
                                    <span
                                        style="color: red"
                                        v-for="(error, index) in errors.name"
                                        :key="index"
                                        >{{ error }}
                                    </span>
                                <v-checkbox
                                    v-model="form.is_main"
                                    label="Main Module"
                                ></v-checkbox>
                                    <v-checkbox
                                    v-model="form.have_workflow"
                                    label="Have Workflow"
                                ></v-checkbox>
                            </form>
                                <v-btn
                                color="success"
                                @click="editItem(editing_Module)"
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
            modules:Array(),
            loading:Boolean(),
        },
        components: {
            Table,
        },
        validations: {
            form:{
                name: { required, maxLength: maxLength(30) },
            }
        },
        data () {
            return {
                // modules:[],
                errors:[],
                title:'',
                routeString:'modules',
                headers: [
                    { text: '#', value: 'index', },
                    { text: 'Main Module', value: 'main_module' },
                    { text: 'Module', value: 'name' },
                    { text: 'Is Main', value: 'is_main' },
                    { text: 'Have Workflow', value: 'have_workflow' },
                    { text: 'Action',  value: 'actions', sortable: false},
                ],
                //end props for table
                form:{
                    name: '',
                    is_main: false,
                    have_workflow: false,
                },
                overlay:false,
                dialog:false,
                editDialog:false,
                deleting_Module:Object(),
                editing_Module:Object(),
                search: '',

                breadcrumbs:[
                    {
                    text: 'Dashboard',
                    disabled: false,
                    href: '/dashboard',
                    },
                    {
                    text: 'Module',
                    disabled: true,
                    href: '/modules',
                    },
                ]
            }
        },
        computed: {
            nameErrors () {
                const errors = []
                if (!this.$v.form.name.$dirty) return errors
                !this.$v.form.name.maxLength && errors.push('Name must be at most 30 characters long')
                !this.$v.form.name.required && errors.push('Name is required.')
                return errors
            },
        },
        created() {
            // this.initialize();
        },
        methods:{
            // initialize() {
            //     //console.log('123');
            //       return new Promise((resolve, reject) => {
            //         axios
            //             .get("/api/modules")
            //             .then(response => {

            //                 this.modules = response.data;
            //                 //console.log(response);
            //                 setTimeout(() => {
            //                     this.loading = false;
            //                     resolve(response);
            //                 }, 100);
            //             })
            //             .catch(error => {
            //                 reject(error);
            //             });
            //     });

            // },
            editItem (item) {
                axios
                .put("/api/modules/"+item.id,this.form)
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
                this.editing_Module=item;
                this.form.name=item.name;
                this.form.is_main=item.is_main;
                this.form.have_workflow=item.have_workflow;
            },
            clear () {
                this.$v.form.$reset()
                this.form.name = ''
                this.form.is_main = false
                this.form.have_workflow = false
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
