<template>
    <div class="m-1" style="margin:auto">
        <v-container>
            <h2>Permission</h2>
            <v-card>
                <v-form>
                    <v-row>
                        <v-col
                            cols="12"
                            sm="4"
                            md="3"
                            v-for="(item, i) in listPermission"
                            :key="i"
                        >
                            <v-checkbox
                                v-model="permission[i]"
                                :value="item.id"
                                :label="item.name"
                                class="mx-2"
                            ></v-checkbox>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="12">
                            <v-btn
                                color="grey darken-4"
                                dark
                                class="mx-2"
                                @click="changePermission()"
                                >Submit</v-btn
                            >
                        </v-col>
                    </v-row>
                </v-form>
                <v-snackbar v-model="message" color="#4CAF50" top>
                    {{ showMessage }}
                    <v-btn color="white" text @click="message = false"
                        >Close</v-btn
                    >
                </v-snackbar>
            </v-card>
        </v-container>
    </div>
</template>
<script>
import axios from "axios";
export default {
    data: () => ({
        message: false,
        showMessage: null,
        roleId: null,
        permission: [],
        listPermission: []
    }),
    created() {
        this.roleId = this.$route.params.role;
        this.getPermission();
    },
    methods: {
        getPermission() {
            axios.get("/api/permissions/" +this.roleId).then(response => {
                this.listPermission = response.data.data.permissions;
                response.data.data.permission_role.forEach(
                    (value, index) => {
                        this.permission[index] = value.permission_id;
                    }
                );
            });
        },
        changePermission() {
            axios.post("/api/permissions/" + this.roleId, {permission: this.permission}).then(response => {
                this.message = true;
                this.showMessage = response.data.data;
                setTimeout(() => {
                    this.$router.push({ name: "admin.role" });
                }, 1000);
            });
        }
    }
};
</script>
