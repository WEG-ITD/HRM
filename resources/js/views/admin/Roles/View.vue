<template>
  <div class="m-1" style="margin:auto">
    <v-data-table
      :headers="headers"
      :search="search"
      :items="desserts"
      :loading="loading"
      sort-by="id"
      class="elevation-1"
    >
      <template v-slot:top>
        <v-toolbar flat color="white">
          <v-toolbar-title>Role & Permission Management</v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>
          <v-spacer></v-spacer>
          <v-text-field
            v-model="search"
            label="Search"
            single-line
            hide-details
          ></v-text-field>
          <v-spacer></v-spacer>
          <v-dialog v-model="dialog" persistent max-width="500px">
            <template v-slot:activator="{ on }">
              <v-btn color="blue-grey darken-2" dark class="mb-2" v-on="on"
                >Add Role</v-btn
              >
            </template>
            <v-form ref="form" v-model="valid" lazy-validation>
              <v-card>
                <v-card-title>
                  <span class="headline">{{ formTitle }}</span>
                </v-card-title>

                <v-card-text>
                  <v-container>
                    <v-row>
                      <v-col cols="12" sm="12" md="12">
                        <v-text-field
                          v-model="editedItem.name"
                          :rules="[v => !!v || 'Name is required']"
                          label="Name"
                          dense
                        ></v-text-field>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-card-text>
                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn color="blue darken-1" text @click="close"
                    >Cancel</v-btn
                  >
                  <v-btn color="blue darken-1" text @click="save">Save</v-btn>
                </v-card-actions>
              </v-card>
            </v-form>
          </v-dialog>
          
        </v-toolbar>
      </template>
        <template v-slot:[`item.pemissions`]="{ item }">
            <v-chip dark v-for="value in item.permissions" :key="value.id">
                {{value.name}}
            </v-chip>
        </template>
            <template v-slot:[`item.action`]="{ item }">
                <v-menu bottom left>
                    <template v-slot:activator="{ on }">
                        <v-btn icon v-on="on">
                            <v-icon>mdi-dots-vertical</v-icon>
                        </v-btn>
                    </template>
                    <v-list>
                        <v-list-item @click="editItem(item)">
                            <v-list-item-content>
                                <v-list-item-title>
                                    <v-icon small>mdi-pencil</v-icon> Edit
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                        <v-list-item @click="permission(item)">
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
      
    </v-data-table>
    <v-snackbar v-model="snackbar" color="#4CAF50" top>
      {{ message }}
      <v-btn color="white" text @click="snackbar = false">Close</v-btn>
    </v-snackbar>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data: () => ({
    user: null,
    valid: true,
    snackbar: false,
    userId: 0,
    loading: true,
    dialog: false,
    confirmation: false,
    search: "",
    active: "Active",
    status: 0,
    message: "",
    role: 1,
    listRole: [],
    headers: [
      {
        text: "Id",
        align: "left",
        sortable: false,
        value: "id"
      },
      { text: "Name", value: "name" },
      { text: "Permission", value: "pemissions" },
      { text: "Actions", value: "action", sortable: false }
    ],
    desserts: [],
    editedIndex: -1,
    editedItem: {
      name: "",
      calories: 0,
      fat: 0,
      carbs: 0,
      protein: 0
    },
    defaultItem: {
      name: "",
      calories: 0,
      fat: 0,
      carbs: 0,
      protein: 0
    }
  }),

  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New Item" : "Edit Item";
    }
  },

  watch: {
    dialog(val) {
      val || this.close();
    }
  },

  created() {
    this.user = this.$store.state.auth.user;
    this.initialize();
 
  },

  methods: {
    initialize() {
      return new Promise((resolve, reject) => {
        axios.get("/api/roles",{
              headers: {
                  Authorization: 'Bearer ' + '8473298654619bfa035a55b51eb27f40fd9416a449e24070732ca5d24e155132',
              }
        }).then(response => {
            this.desserts = response.data.data;
            setTimeout(() => {
              this.loading = false;
              resolve(response);
            }, 100);
          }).catch(error => {
            reject(error);
          });
      });
    },

    editItem(item) {
      this.editedIndex = this.desserts.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.dialog = true;
    },



    close() {
      this.dialog = false;
      setTimeout(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      }, 300);
    },

    save() {
      if (this.$refs.form.validate()) {
        const data = {
            name: this.editedItem.name,
            user_name: this.editedItem.userName,
            email: this.editedItem.email,
            phone: this.editedItem.phone,
            role_id: this.editedItem.role,
            password: this.editedItem.password,
          };
        if (this.editedIndex > -1) {
          axios.put("/api/role/edit/" + this.editedItem.id, data)
            .then(response => {
              if (response) {
                this.snackbar = true;
                this.message = "Successfully!!";
                this.dialog = false;
                Object.assign(this.desserts[this.editedIndex], this.editedItem);
              }
            }).catch(error => {
              //console.log(error);
            });
        } else {
          axios.post("/api/role", data)
            .then(response => {
              if (response.data.status == 400) {
                this.snackbar = true;
                this.dialog = true;
                this.message = response.data.error.message;
              } else {
                this.snackbar = true;
                this.message = "Successfully!!";
                this.desserts.push(this.editedItem);
                this.dialog = false;
              }
            })
            .catch(error => {
              this.snackbar = true;
              this.message = error.errors;
            });
        }
      }
      // this.close();
    },
    permission(item) {
          this.$router.push({
              name: "admin.permission",
              params: { role: item.id }
          });
      }
  }
};
</script>
