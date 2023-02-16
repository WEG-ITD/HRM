<!-- <template>
    <v-form @submit.prevent="submitForm">
      <v-row>
        <v-col cols="12" md="6">
          <v-select
            label="Branch"
            :items="branches"
            v-model="selectedBranch"
            item-text="name"
            item-value="id"
            return-object
            :rules="[rules.required]"
          />
        </v-col>
        <v-col cols="12" md="6">
          <v-select
            label="Applicable User"
            :items="users"
            v-model="selectedUser"
            item-text="name"
            item-value="id"
            return-object
            :rules="[rules.required]"
          />
        </v-col>
      </v-row>

      <v-row>
        <v-col cols="12" md="6">
          <v-select
            label="Layout"
            :items="layouts"
            v-model="selectedLayout"
            :rules="[rules.required]"
          />
        </v-col>
        <v-col cols="12" md="6">
          <v-select
            label="User Photo Style"
            :items="photoStyles"
            v-model="selectedPhotoStyle"
            :rules="[rules.required]"
          />
        </v-col>
      </v-row>

      <v-row>
        <v-col cols="12" md="6">
          <v-text-field
            label="Layout Spacing (px)"
            v-model="layoutSpacing"
            :rules="[rules.required]"
          />
        </v-col>
        <v-col cols="12" md="6">
          <v-file-input
            label="Signature Image"
            v-model="signatureImage"
            :rules="[rules.required]"
          />
        </v-col>
      </v-row>

      <v-row>
        <v-col cols="12" md="6">
          <v-file-input
            label="Logo Image"
            v-model="logoImage"
            :rules="[rules.required]"
          />
        </v-col>
        <v-col cols="12" md="6">
          <v-file-input
            label="Background Image"
            v-model="backgroundImage"
            :rules="[rules.required]"
          />
        </v-col>
      </v-row>

      <v-textarea
        label="Certificate Content"
        v-model="certificateContent"
        :rules="[rules.required]"
      />

      <v-btn color="primary" type="submit">Submit</v-btn>
    </v-form>
  </template> -->
  <template>
  <div class="m-1" style="margin: auto">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <!-- Add Module-->
      <div>
        <v-card-text>
          <div v-if="errors" style="color: red">
            <span v-for="(err, i) in errors" :key="i">
              <span
                style="display: block"
                v-for="(e, index) in err"
                :key="index"
              >
                {{ i }}: {{ e }}
              </span>
            </span>
          </div>
          <v-form @submit.prevent="submitForm">
            <v-row>
              <v-col cols="12" md="6">
                <v-select
                  label="Branch"
                  :items="branches"
                  v-model="selectedBranch"
                  item-text="name_en"
                  item-value="id"
                  return-object
                  :rules="[rules.required]"
                />
              </v-col>
              <v-col cols="12" md="6">
                <v-select
                  label="Applicable User"
                  :items="users"
                  v-model="selectedUser"
                  item-text="name"
                  item-value="id"
                  return-object
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>

            <v-row>
              <v-col cols="12" md="6">
                <v-select
                  label="Layout"
                  :items="layouts"
                  v-model="selectedLayout"
                  :rules="[rules.required]"
                />
              </v-col>
              <v-col cols="12" md="6">

              </v-col>
            </v-row>
            <v-row>
                <v-col cols="12" sm="6">
                    <v-select
                        label="User Photo Style"
                        :items="photoStyles"
                        v-model="selectedPhotoStyle"
                        :rules="[rules.required]"
                    />
                </v-col>
                <v-col cols="12" sm="6">
                    <v-text-field label="Photo Size (px)"></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="12" sm="6">
                    <v-text-field label="Top Space (px)"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6">
                    <v-text-field label="Bottom Space (px)"></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="12" sm="6">
                    <v-text-field label="Right Space (px)"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6">
                    <v-text-field label="Left Space (px)"></v-text-field>
                </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="6">
                <v-text-field
                  label="Layout Spacing (px)"
                  v-model="layoutSpacing"
                  :rules="[rules.required]"
                />
              </v-col>
              <v-col cols="12" md="6">
                <v-file-input
                  label="Signature Image"
                  v-model="signatureImage"
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>

            <v-row>
              <v-col cols="12" md="6">
                <v-file-input
                  label="Logo Image"
                  v-model="logoImage"
                  :rules="[rules.required]"
                />
              </v-col>
              <v-col cols="12" md="6">
                <v-file-input
                  label="Background Image"
                  v-model="backgroundImage"
                  :rules="[rules.required]"
                />
              </v-col>
            </v-row>

            <v-textarea
              label="Certificate Content"
              v-model="certificateContent"
              :rules="[rules.required]"
            />
          </v-form>
          <v-spacer></v-spacer>
          <p></p>
          <v-btn color="success" @click="submitForm"> Add </v-btn>
          <v-btn > clear </v-btn>
        </v-card-text>
      </div>
    </div>
  </div>
</template>
<script>
import { validationMixin } from "vuelidate";
import { VueEditor } from 'vue2-quill-editor';
import {
    required,
    maxLength,
    minLength,
    email,
} from "vuelidate/lib/validators";
import Snackbar from "@/components/Snackbar";
import axios from "axios";

//constant API_ENDPOINTS to store the API in one place
const API_ENDPOINTS = {
  CERTIFICATE_TEMPLATES: '/api/certificate-templates',
  BRANCHES: '/api/branches',
  USERS: '/api/users',
};
export default {
  name: "CertificateForm",
  data() {
    return {
      errors: [],
      branches: [],
      users: [],
      layouts: ["A4 Portrait", "A4 Landscape"],
      photoStyles: ["Square", "Round"],
      selectedBranch: null,
      selectedUser: null,
      selectedLayout: null,
      selectedPhotoStyle: null,
      layoutSpacing: null,
      signatureImage: null,
      logoImage: null,
      backgroundImage: null,
      certificateContent: null,
      rules: {
        required: (value) => !!value || "Required.",
      },
    };
  },
  methods: {
    async fetchBranches() {
      const response = await axios.get(API_ENDPOINTS.BRANCHES);
      this.branches = response.data.data;
    },
    async fetchUsers() {
      const response = await axios.get(API_ENDPOINTS.USERS);
      this.users = response.data.data;
    },
    async submitForm() {
      const data = {
        branch_id: this.selectedBranch,
        user_id: this.selectedUser,
        layout: this.selectedLayout,
        photo_style: this.selectedPhotoStyle,
        layout_spacing: this.layoutSpacing,
        signature: this.signature,
        logo: this.logo,
        background: this.background,
        content: this.content,
      };

        if (data) {
        this.$root.Overlay.on();
        axios.post(API_ENDPOINTS.CERTIFICATE_TEMPLATES, data)
            .then((response) => {
                //console.log(response);
                if (response) {
                    this.$emit("refresh");
                    this.errors.name = null;
                    this.$root.Snackbar.show({ message: response.data.message, snackColor: response.data.snackColor, })
                    this.$root.Overlay.off();
                    this.clear();
                }
            })
            .catch((error) => {
                //console.log(error);
                if (error.response) {
                    this.errors = error.response.data.errors;
                    this.$root.Snackbar.show({ message: error.response.data.message, snackColor: 'error', })
                    this.$root.Overlay.off();
                } else {
                    this.$root.Snackbar.show({ message: error.message, snackColor: 'error', })
                    this.$root.Overlay.off();
                }
            });
        }
    },
  },
  created() {
    this.fetchBranches();
    this.fetchUsers();
  },
};
</script>
