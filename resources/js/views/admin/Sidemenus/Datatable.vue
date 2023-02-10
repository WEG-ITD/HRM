<template>
    <div class="m-1" style="margin:auto">

            <Table
            @refresh="$emit('refresh')"
            :loading="loading"
            :headers="headers"
            :items="sidemenus"
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
                            Edit Sidemenu:  {{editing_Sidemenu.name}}?
                        </v-card-title>
                        <v-card-text>
                            <form @submit.prevent="submit">
                                <v-select
                                    v-model="form.type"
                                    :items="types"
                                    item-value="id"
                                    item-text="name"
                                    :error-messages="typeErrors"
                                    label="Type"
                                    required
                                    @change="$v.form.type.$touch()"
                                    @blur="$v.form.type.$touch()"
                                ></v-select>
                                <div style="color:red" v-if="errors.type">{{ errors.type[0] }}</div>
                                <v-text-field
                                    v-model="form.icon"
                                    :error-messages="iconErrors"
                                    label="Icon"
                                    required
                                    type="text"
                                    @click:append="show1 = !show1"
                                    @input="$v.form.icon.$touch()"
                                    @blur="$v.form.icon.$touch()"
                                ></v-text-field>
                                <a href="https://pictogrammers.github.io/@mdi/font/6.5.95/" target="_black">Get Icon from here</a>
                                <div style="color:red" v-if="errors.icon">{{ errors.icon[0] }}</div>
                                <v-text-field
                                    v-model="form.name"
                                    :error-messages="nameErrors"
                                    label="Name"
                                    required
                                    type="text"
                                    @click:append="show1 = !show1"
                                    @input="$v.form.name.$touch()"
                                    @blur="$v.form.name.$touch()"
                                ></v-text-field>
                                <div style="color:red" v-if="errors.name">{{ errors.name[0] }}</div>
                                <v-select
                                    v-model="form.module"
                                    :items="modules"
                                    item-value="id"
                                    item-text="name"
                                    :disabled="form.type!=1"
                                    label="Module"
                                    required
                                ></v-select>
                                <div style="color:red" v-if="errors.module">{{ errors.module[0] }}</div>

                                    <v-text-field
                                    v-model="form.link"
                                    :error-messages="linkErrors"
                                    label="Link"
                                    :disabled="form.type!=1"
                                    required
                                    type="text"
                                    @click:append="show1 = !show1"
                                ></v-text-field>
                                <div style="color:red" v-if="errors.link">{{ errors.link[0] }}</div>
                                    <v-text-field
                                    v-model="form.ordering"
                                    :error-messages="orderingErrors"
                                    label="Ordering"
                                    required
                                    type="number"
                                    @click:append="show1 = !show1"
                                    @input="$v.form.ordering.$touch()"
                                    @blur="$v.form.ordering.$touch()"
                                ></v-text-field>
                                <div style="color:red" v-if="errors.ordering">{{ errors.ordering[0] }}</div>
                                <v-select
                                    v-model="form.parentId"
                                    :items="parents"
                                    :error-messages="parentErrors"
                                    item-value="id"
                                    item-text="name"
                                    label="Parent"
                                    @change="$v.form.parentId.$touch()"
                                    @blur="$v.form.parentId.$touch()"
                                ></v-select>
                                <div style="color:red" v-if="errors.parentId">{{ errors.parentId[0] }}</div>
                                <v-checkbox
                                    v-model="form.is_report"
                                    label="Is Report"
                                ></v-checkbox>
                            </form>
                            <v-btn
                                color="success"
                                @click="editItem(editing_Sidemenu)"
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
            sidemenus:Array(),
            modules:Array(),
            loading:Boolean(),
        },
        components: {
            Table,
        },
        validations: {
            form:{
                name: { required },
                module: {  },
                type: { required },
                icon: { required },
                ordering: { required },
                parentId:{required}}
        },
        data () {
            return {
                // sidemenus:[],
                routeString:"sidemenus",
                types:[
                    {id:0,name:'Group'},
                    {id:1,name:'Item'},
                ],

                errors:[],
                title:'',
                routeString:'sidemenus',
               headers: [
                    { text: 'Index', value: 'index', },
                    { text: 'icon', value: 'icon' },
                    { text: 'name', value: 'name' },
                    { text: 'link', value: 'link' },
                    { text: 'order', value: 'ordering' },
                    { text: 'Parent', value: 'parentId' },
                    { text: 'Is Report', value: 'is_report' },
                    { text: 'Action',  value: 'actions', sortable: false},
                ],
                //end props for table
                form:{
                    module: null,
                    type: null,
                    icon:'',
                    name:'',
                    link:'',
                    ordering:'',
                    parentId:'',
                    is_report:false,
                },
                show1: false,
                dialog:false,
                editDialog:false,
                editing_Sidemenu:Object(),
            }
        },
        computed: {
            moduleErrors () {
                const errors = []
                if (!this.$v.form.module.$dirty) return errors
                !this.$v.form.module.required && errors.push('Module is required')
                return errors
            },
            iconErrors () {
                const errors = []
                if (!this.$v.form.icon.$dirty) return errors
                !this.$v.form.icon.required && errors.push('Icon is required')
                return errors
            },
            nameErrors () {
                const errors = []
                if (!this.$v.form.name.$dirty) return errors
                !this.$v.form.name.required && errors.push('Name is required')
                return errors
            },
            typeErrors () {
                const errors = []
                if (!this.$v.form.type.$dirty) return errors
                !this.$v.form.type.required && errors.push('Type to is required')
                return errors
            },
            orderingErrors () {
                const errors = []
                if (!this.$v.form.ordering.$dirty) return errors
                !this.$v.form.ordering.required && errors.push('Order to is required')
                return errors
            },
            linkErrors() {
                const errors = []
                if (!this.$v.form.ordering.$dirty) return errors
                !this.$v.form.ordering.required && errors.push('Link is required')
                return errors
            },
            parentErrors() {
                const errors = []
                if (!this.$v.form.parentId.$dirty) return errors
                !this.$v.form.parentId.required && errors.push('Parent is required')
                return errors
            },
            parents(){
                let a=this.sidemenus.filter(x=>x.type==0);
                a.push({id:0,name:'Root'})
                return a;
            }
        },
        created() {
            // this.initialize();
        },
        methods:{

            editItem (item) {
                axios
                .put("/api/sidemenus/"+item.id,this.form)
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
                this.editing_Sidemenu=item;
                this.editDialog = true;
                this.form.module=item.module_id;
                this.form.name=item.name;
                this.form.icon=item.icon;
                this.form.link=item.link;
                this.form.type=item.type;
                this.form.ordering=item.ordering;
                this.form.parentId=item.parentId;
                this.form.is_report=item.is_report;

            },
            clear () {
                this.$v.form.$reset()
                this.form.name = ''
                this.form.module=null;
                this.form.icon='';
                this.form.link='';
                this.form.type=0;
                this.form.ordering=0;
                this.form.parentId=0;
                this.form.is_report=0;
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
