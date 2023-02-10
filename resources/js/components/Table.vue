<template>
   <div>
        <v-card-title>
        {{title}}
        <v-spacer></v-spacer>
            <v-text-field class="pt-0 mt-0"
                v-model="search"
                append-icon="mdi-magnify"
                label="Search..."
                hide-details
            ></v-text-field>
        </v-card-title>
        <v-data-table
            :headers="headers"
            :items="items"
            :search="search"
            :loading="loading"
        >
            <slot></slot>
            <template v-for="(slot, name) in $scopedSlots" v-slot:[name]="item">
                <slot :name="name" v-bind="item"></slot>
            </template>
            <template v-slot:[`item.actions`]="{ item }">
                <v-menu bottom offset-y>
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn class="ma-2" icon tile v-bind="attrs" v-on="on">
                            <v-icon>mdi-menu</v-icon>
                        </v-btn>
                    </template>
                    <v-list dense>
                        <v-list-item-group>
                            <v-list-item v-if="item.can.view" @click="openViewDialog(item)">
                                <v-list-item-icon>
                                    <v-icon>mdi-eye</v-icon>
                                </v-list-item-icon>
                                <v-list-item-content>
                                    <v-list-item-title>View</v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </v-list-item-group>
                        <v-list-item-group>
                            <v-list-item v-if="item.can.update" @click="openEditDialog(item)">
                                <v-list-item-icon>
                                    <v-icon>mdi-pencil</v-icon>
                                </v-list-item-icon>
                                <v-list-item-content>
                                    <v-list-item-title>Edit</v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </v-list-item-group>
                        <v-list-item-group>
                            <v-list-item v-if="item.can.delete" @click="openDialogConfirmation(item)">
                                <v-list-item-icon>
                                    <v-icon>mdi-delete</v-icon>
                                </v-list-item-icon>
                                <v-list-item-content>
                                    <v-list-item-title>Delete</v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </v-list-item-group>
                    </v-list>
                </v-menu>
            </template>
        </v-data-table>
        <template>
            <div class="text-center">
                <v-dialog
                    v-model="dialog"
                    width="500"
                >
                    <v-card class="rounded-sm">
                        <v-card-title class="text-h6 grey lighten-2 pt-1 pb-1 mt-1 mb-1 pr-0 mr-0">
                            <span>Warning</span>
                            <v-spacer></v-spacer>
                            <v-btn icon tile @click="dialog = false">
                                <v-icon>mdi-close</v-icon>
                            </v-btn>
                        </v-card-title>
                        <p></p>
                        <v-card-text class="text--primary">
                            <div>You are about to delete the <strong>{{ this.deleting_item.name_en }}</strong>. This action cannot be reversed.</div>
                            <div>Are you sure you want to continue?</div>
                        </v-card-text>
                        <v-divider class="m-0" style="background-color:#90A4AE; width:100%;"></v-divider>
                        <v-card-actions class="pr-2">
                            <v-spacer></v-spacer>
                            <v-btn
                                color="warning"
                                dark
                                @click="deleteItem(deleting_item)"
                            >
                                Continue
                            </v-btn>
                            <v-btn
                                color="error"
                                dark
                                @click="dialog = false"
                            >
                                Cancel
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </div>
        </template>
         <Snackbar
            :message="message"
            :snackColor="snackColor"
            :snackbar="snackbar"
        >
        </Snackbar>
    </div>
</template>
<script>

import Tooltip from "@/components/Tooltip.vue";
import Snackbar from "@/components/Snackbar"
import axios from "axios";
export default {
    components:{
        Tooltip,
        Snackbar
    },
    props:{
            headers:{default:[],type:Array},
            items:{default:[],type:Array},
            title:{default:'Title',type:String},
            routeString:{default:'',type:String},
            openEditDialog: { type: Function },
            openViewDialog: { type: Function },
            loading:Boolean(),

        },
    data () {
        return {
            snackbar: false,
            snackColor:'',
            message:'',
            search:'',
            dialog:false,
            deleting_item:Object(),
        }
    },
    // computed: {
    //     noData () {
    //         return this.headers.filter('No result found')
    //     }
    // },
    methods:{

            openDialogConfirmation(item){
                this.message = '';
                this.dialog = true;
                this.deleting_item=item;
                console.log(this.deleting_item);
            },
            deleteItem (item) {
                    this.dialog = false;
                    this.$root.Overlay.on();
                    axios.delete("/api/"+this.routeString+"/"+item.id)
                    .then(response => {
                        if (response) {
                            // this.message = response.data.message;
                            // this.snackColor=response.data.snackColor;
                            // this.snackbar = true;
                            this.$emit('refresh');

                            this.$root.Snackbar.show({message: response.data.message,snackColor:response.data.snackColor,})
                            this.$root.Overlay.off();
                        }
                    }).catch(error => {
                        if(error){
                            // this.message = error;
                            // this.snackbar = true;
                            // this.snackColor='error';
                            //console.log(error.response);
                            this.$root.Snackbar.show({message:error+' '+error.response.data.message,snackColor:'error',})
                            this.$root.Overlay.off();
                        }
                    });
            },
     }
}
</script>

<style>

</style>
