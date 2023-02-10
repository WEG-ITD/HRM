<template>
    <div class="m-1" style="margin:auto">

            <Table

            @refresh="$emit('refresh')"
            :loading="loading"
            :headers="headers"
            :items="roles"
            :title="title"
            :routeString="routeString"
            :openEditDialog="openEditDialog"
            >
                <template v-slot:[`item.index`]="{ index }">
                        {{ index + 1 }}
                </template>
                <template v-slot:[`item.permissions`]="{ item }">

                    <v-chip
                        v-for="(permission,index) in item.permissions"
                        class="ma-2"
                        filter
                        :key="index"
                        >
                        {{permission.module}}
                    </v-chip>
                </template>
                <template v-slot:[`item.action`]="{ item }">
                    <v-menu bottom left>
                        <template v-slot:activator="{ on }">
                            <v-btn icon v-on="on">
                                <v-icon>mdi-dots-vertical</v-icon>
                            </v-btn>
                        </template>
                        <v-list dense>
                            <v-list-item v-if="item.can.update" @click="openEditDialog(item)">
                                <v-list-item-content>
                                    <v-list-item-title>
                                        <v-icon small>mdi-pencil</v-icon> Edit
                                    </v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                            <v-list-item v-if="item.can.viewPermission" @click="openPermissionDialog(item)">
                                <v-list-item-content>
                                    <v-list-item-title>
                                        <v-icon small>mdi-view-module</v-icon>
                                        Permission
                                    </v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </v-list>
                    </v-menu>
                </template>
            </Table>
                <!--Edit dialog-->
                <v-dialog
                v-model="editDialog"
                max-width="600"
                >
                    <v-card elevation="5">
                        <v-card-title>
                            Edit Role:  {{editing_Role.name}}?
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
                                <v-btn
                                color="success"
                                @click="editItem(editing_Role)"
                                >
                                Update
                            </v-btn>
                            <v-btn @click="clear">
                                clear
                            </v-btn>
                        </v-card-text>
                    </v-card>
                </v-dialog>
                <!--Permission Dialog-->
                <v-dialog
                    v-model="permissionDialog"
                    v-if="permission_role.can"
                    >
                    <v-card elevation="5">
                        <v-card-title>
                            {{permission_role.name}} Permissions:
                        </v-card-title>
                        <v-card-text>
                            <v-simple-table fixed-header  height="500px" style="margin:auto">
                                <thead>
                                    <tr>
                                        <th style="position: sticky;left: 0;z-index:9999;">
                                            <v-text-field
                                                v-model="searchModule"
                                            ></v-text-field>


                                        </th>
                                        <th  v-for="action in actions" :key="action">{{action}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(module,i) in modulePermission" :key="i">
                                        <td style="position: sticky;left: 0;z-index:9999;">{{module.name}}</td>
                                        <td v-for="(action,i) in actions" :key="i">
                                            <v-checkbox
                                                :disabled="!permission_role.can.updatePermission"
                                                v-model="permissionCollection"
                                                :value="module.id+'-'+action"
                                            ></v-checkbox>
                                        </td>
                                        <template v-if="module.name=='Role'">
                                            <td v-for="(action,i) in extraActions" :key="i">
                                                <span>{{action}}</span>
                                                 <v-checkbox
                                                    :disabled="!permission_role.can.updatePermission"
                                                    v-model="permissionCollection"
                                                    :value="module.id+'-'+action"
                                                ></v-checkbox>
                                            </td>
                                        </template>
                                    </tr>
                                </tbody>
                            </v-simple-table>
                        </v-card-text>
                        <v-card-actions>
                            <v-btn
                                v-if="permission_role.can.updatePermission"
                                color="success"
                                @click="permissioning(permission_role.id)"
                                >
                                Update
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
        props:{
            user:Object(),
            roles:Array(),
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
                // roles:[],
                searchModule:'',
                actions:[
                    'viewAny','view','create','update','delete','print'
                ],
                extraActions:[
                    'report','import','export','updateRole','updatePermission'
                ],
                permissionCollection:[],
                permissionDialog:false,
                permission_role:Object(),
                errors:[],
                title:'',
                routeString:'roles',
                headers: [
                {
                    text: "Id",
                    align: "left",
                    sortable: false,
                    value: "id"
                },
                { text: "Name", value: "name" },
                { text: "Value", value: "value" },
                { text: "Permission", value: "permissions" },
                { text: "Actions", value: "action", sortable: false }
                ],
                //end props for table
                form:{
                    name: '',
                    value: '',
                },
                overlay:false,
                dialog:false,
                editDialog:false,
                deleting_Role:Object(),
                editing_Role:Object(),
                search: '',
                breadcrumbs:[
                    {
                    text: 'Dashboard',
                    disabled: false,
                    href: '/dashboard',
                    },
                    {
                    text: 'Role',
                    disabled: true,
                    href: '/roles',
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
             modulePermission () {
                if(!this.modules){return ''};
                return this.modules.filter(x=>x.name.toLowerCase().includes(this.searchModule));
            },
        },
        created() {
            // this.initialize();
            this.$root.Overlay.off();
        },
        methods:{
            editItem (item) {
                axios
                .put("/api/roles/"+item.id,this.form)
                .then(response => {
                    this.$root.Snackbar.show({message: response.data.message,snackColor:response.data.snackColor,})
                    this.$emit('refresh');
                    this.editDialog=false;
                    this.clear();
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
                this.editing_Role=item;
                this.form.name=item.name;
                this.form.value=item.value;
            },
            clear () {
                this.$v.form.$reset()
                this.form.name = ''
                this.form.value = ''
            },
            // Permission
            openPermissionDialog(item){
                //console.log(item);
                let a=[];
                //console.log(item);
                let permission=item.permissions;
                    permission.forEach(element => {
                    a.push(element.permissionCollection)
                });
                this.permissionCollection=a;
                //console.log(a);
                this.permissionDialog=true;
                this.permission_role=item;
            },
            permissioning(id){
                this.$root.Overlay.on();
                axios.post('/api/permissions/update/'+id,this.permissionCollection)
                .then(response => {
                    this.$root.Snackbar.show({message: response.data.message,snackColor:response.data.snackColor,})
                    this.$emit('refresh');
                    this.permissionDialog=false;
                    this.clear();
                    this.$root.Overlay.off();
                })
                .catch(error => {
                     //console.log(error);
                    if(error.response){
                        this.errors = null;
                        this.errors = error.response.data.errors;
                        this.$root.Snackbar.show({message: error.response.data.message,snackColor:'error',})
                        this.$root.Overlay.off();
                    }else{
                        this.$root.Snackbar.show({message: error.message,snackColor:'error',})
                        this.$root.Overlay.off();
                    }
                });
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
