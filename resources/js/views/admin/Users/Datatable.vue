<template>
<div class="m-1" style="margin:auto">
    <Table
        :loading="loading"
        :headers="headers"
        :items="users"
        :title="title"
    >
        <template v-slot:[`item.role`]="{ item }">
            <v-chip
                v-for="(role,index) in item.roles"
                class="ma-2"
                filter
                :key="index"
                >
                {{role.name}}
            </v-chip>
        </template>
        <template v-slot:[`item.action`]="{ item }">
            <Tooltip tooltip="Edit User">
                        <v-icon  small class="mr-2" @click="editItem(item)">mdi-pencil</v-icon>
            </Tooltip>
            <Tooltip tooltip="Edit Role">
                        <v-icon  small class="mr-2" @click="openRoleDialog(item)">mdi-account-group-outline</v-icon>
            </Tooltip>
            <Tooltip tooltip="Reset">
                        <v-icon  small class="mr-2" @click="openResetDialog(item)">mdi-lock-reset</v-icon>
            </Tooltip>
        </template>
    </Table>
     <v-dialog v-model="dialog" persistent max-width="500px">
        <v-form ref="form" v-model="valid" lazy-validation>
            <v-card>
                <v-card-title>
                    <span class="headline">{{ formTitle }}</span>
                </v-card-title>
                <v-card-text>
                    <v-container>
                        <v-row>
                            <v-col cols="12" sm="12" md="12">
                                <v-text-field v-model="editedItem.name"
                                    :rules="[v => !!v || 'Name is required']" label="Name" dense>
                                </v-text-field>
                            </v-col>
                            <v-col cols="12" sm="12" md="12">
                                <v-text-field v-model="editedItem.userName"
                                    :rules="[v => !!v || 'UserName is required']" label="UserName" dense>
                                </v-text-field>
                            </v-col>
                            <v-col cols="12" sm="12" md="12">
                                <v-text-field v-model="editedItem.email" label="Email" dense>
                                </v-text-field>
                            </v-col>
                            <v-col cols="12" sm="12" md="12">
                                <v-text-field v-model="editedItem.phone"
                                    :rules="[v => !!v || 'Phone is required']" label="Phone" dense
                                    type="number"></v-text-field>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
                    <v-btn color="blue darken-1" text @click="save">Save</v-btn>
                </v-card-actions>
            </v-card>
        </v-form>
    </v-dialog>
    <v-dialog v-model="rolesDialog" max-width="500px">
        <v-form>
            <v-card>
                <v-card-title>
                    <span class="headline">Roles</span>
                </v-card-title>
                <v-card-text>
                    <v-container>
                        <v-row>
                            <v-col cols="12" sm="12" md="12">
                                <v-combobox
                                    v-model="addingRole"
                                    :items="listRole"
                                    item-text="name"
                                    item-value="id"
                                    label="Role">
                                </v-combobox>
                                <v-btn @click="addRole">
                                    Add Role
                                </v-btn>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="12" sm="12" md="12">
                                <v-list-item
                                    v-for="role in rolesForUser"
                                    :key="role.id"
                                >

                                    <v-list-item-content>
                                    <v-list-item-title v-text="role.name"></v-list-item-title>
                                    </v-list-item-content>

                                    <v-list-item-action>
                                    <v-btn icon>
                                        <v-icon color="danger" @click="removeRole(role)">mdi-delete</v-icon>
                                    </v-btn>
                                    </v-list-item-action>
                                </v-list-item>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card-text>
            </v-card>
        </v-form>
    </v-dialog>
    <v-dialog v-model="resetPasswordDialog" max-width="500px">
        <v-form>
            <v-card>
                <v-card-title>
                    <span class="headline">Reset Password</span>
                </v-card-title>
                <v-card-text>
                    <v-container>
                        <v-row>
                            <v-col cols="12" sm="12" md="12">
                                <v-text-field
                                    v-model="editedItem.password"
                                    label="New Password"
                                    dense
                                    required
                                    :error-messages="passwordErrors"
                                    :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                                    :type="show ? 'text' : 'password'"
                                    @click:append="show = !show"
                                    @change="$v.editedItem.password.$touch()"
                                    @blur="$v.editedItem.password.$touch()">
                                </v-text-field>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click="resetPasswordDialog=false">Cancel</v-btn>
                    <v-btn color="blue darken-1" :disabled="processing" text @click="resetPassword">Save</v-btn>
                </v-card-actions>
            </v-card>
        </v-form>
    </v-dialog>
    <v-dialog v-model="confirmation" max-width="290">
        <v-card>
            <v-card-title class="headline">User Confirmation</v-card-title>
            <v-card-text>Are you sure to {{ active }}? </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="green darken-1" text @click="confirmation = false">
                    Disagree
                </v-btn>
                <v-btn color="green darken-1" text @click="changeStutusUser">
                    Yes
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
    <Snackbar
        :message="message"
        :snackColor="snackColor"
        :snackbar="snackbar"
    >
    </Snackbar>
</div>
</template>
<script>

import { validationMixin } from 'vuelidate';
import axios from "axios";
import { required, minLength, between } from 'vuelidate/lib/validators'
import Tooltip from "../../../components/Tooltip.vue";
import Snackbar from "@/components/Snackbar"
import Table from "@/components/Table"
export default {
    mixins: [validationMixin],
    props:{
        users:Array(),
        listRole:Array(),
        loading:Boolean(),
    },
    components:{
        Tooltip,
        Snackbar,
        Table
    },
    validations: {
         editedItem:{
            password: { required,minLength: minLength(8) },
         }
    },
    data: () => ({
        title:'',
        processing:false,
        show: false,
        show1: false,
        user:null,
        auth:null,
        rolesDialog:false,
        addingRole:null,
        resetPasswordDialog:false,
        valid: true,
        snackbar: false,
        snackColor:'',
        userId: 0,
        dialog: false,
        confirmation: false,
        search: "",
        active: "Active",
        status: 0,
        message: "",
        role: 1,
        tab: null,
        headers: [
            {
                text: "Id",
                align: "left",
                sortable: false,
                value: "id"
            },
            { text: "Name", value: "name" },
            { text: "Branch/Depart", value: "branch" },
            { text: "Staff ID", value: "userName" },
            { text: "Email", value: "email" },
            { text: "Mobile No", value: "phone" },
            // { text: "Role", value: "role" , sortable: false },
            { text: "Status", value: "status" },
            { text: "Actions", value: "action", sortable: false }
        ],
        rolesForUser:[],
        editedIndex: -1,
        editedItem: {
            password:'',
        },
        defaultItem: {
        }
    }),

    computed: {
        formTitle() {
            return this.editedIndex === -1 ? "New Item" : "Edit Item";
        },
        passwordErrors () {
            const errors = []
            if (!this.$v.editedItem.password.$dirty) return errors
            !this.$v.editedItem.password.minLength && errors.push('Password must be at least 8 characters long')
            !this.$v.editedItem.password.required && errors.push('Password is required')
            return errors
        },
    },

    watch: {
        dialog(val) {
            val || this.close();
        },
        rolesDialog:function(newValue,old){
             if(!newValue){
                this.addingRole=null;
            }
        }
    },

    created() {
        //console.log(this.$store.state);

        this.auth = this.$store.state.auth.user;

    },

    methods: {

        editItem(item) {
            //console.log(item);
            this.editedIndex = this.users.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },
        close() {
            this.dialog = false;
            setTimeout(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
            }, 300);
        },

        save() {
            if (this.$refs.form.validate()) {
                const data = {
                    id: this.editedItem.id,
                    name: this.editedItem.name,
                    user_name: this.editedItem.userName,
                    email: this.editedItem.email,
                    phone: this.editedItem.phone,
                    roles: this.editedItem.roles,
                };
                axios.put("/api/users/" + this.editedItem.id, data)
                .then(response => {
                    if (response) {
                        this.$emit('refresh');
                        this.$root.Snackbar.show({message: response.data.message,snackColor:response.data.snackColor,})
                        this.dialog=false;
                    }
                }).catch(error => {
                    //console.log(error);
                    this.$root.Snackbar.show({message: error.message,snackColor:'error',})
                    this.$root.Overlay.off();
                });

            }
            // this.close();
        },
        changeStutusUser() {
            axios.put(this.$baseURL + "users/" + this.userId + "/" + this.status, { status: this.status })
            .then(response => {
                //console.log(response);
                this.snackbar = true;
                this.message = "Successfully!!";
                this.confirmation = false;
                setTimeout(() => {
                    window.location.reload(true);
                }, 1000);
            });
        },
        openRoleDialog(item){
            this.rolesDialog=true;
            this.user=item;
            this.rolesForUser=item.roles;
        },
        openResetDialog(item){
            this.resetPasswordDialog=true;
            this.user=item;
        },
        addRole(){
            var data={
                user:this.user.id,
                role:this.addingRole.id
            }
            axios.post("/api/user/addRole", data)
            .then(response => {
                this.$emit('refresh');
                this.$root.Snackbar.show({message: response.data.message,snackColor:response.data.snackColor,})
                //console.log(response);
                this.rolesForUser=response.data.roles;
            })
            .catch(error => {
                this.$root.Snackbar.show({message: error.message,snackColor:'error',})

            });
        },
        removeRole(role){
            axios.get("/api/user/removeRole/" +role.pivot.id)
            .then(response => {
                this.$emit('refresh');
                this.$root.Snackbar.show({message: response.data.message,snackColor:response.data.snackColor,})
                this.rolesForUser=response.data.roles;
            })
            .catch(error => {
                this.$root.Snackbar.show({message: error.message,snackColor:'error',})

            });
        },
        resetPassword(){
            this.$v.$touch();
            let isFormCorrect=this.$v.editedItem.$invalid;
            const data = {
                password: this.editedItem.password,
                user_id: this.user.id,
            };
            if (!isFormCorrect) {
                this.processing=true;
                axios.post("/api/user/resetPassword", data)
                .then(response => {
                    this.$root.Snackbar.show({message: response.data.message,snackColor:response.data.snackColor,})
                    this.resetPasswordDialog=false;
                    this.processing=false;
                    this.editedItem='';
                })
                .catch(error => {
                    this.$root.Snackbar.show({message: error.message,snackColor:'error',})
                    this.processing=false;
                });
            }
        }

    }
};
</script>
