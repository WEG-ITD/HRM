<template>
  <div class="m-1" style="margin: auto">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div>
        <!-- <v-card-text> -->
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
          <v-form @submit.prevent="submit" enctype="multipart/form-data">
            <v-card class="mx-auto" elevation="1">
              <v-card-text>
                <p class="text-h5 text--primary">Certificate Information</p>
                <v-text-field
                  v-model="form.title"
                  :error-messages="titleErrors"
                  :counter="100"
                  label="Certificate title*"
                  required
                  @input="$v.form.title.$touch()"
                  @blur="$v.form.title.$touch()"
                ></v-text-field>
                <div v-if="errors.title">
                  <span
                    style="color: red"
                    v-for="(error, index) in errors.title"
                    :key="index"
                    >{{ error }}
                  </span>
                </div>
                <v-row>
                  <v-col cols="12" md="6">
                    <v-select
                      v-model="form.branch_id"
                      :items="branches"
                      :error-messages="branchErrors"
                      @input="$v.form.branch_id.$touch()"
                      @blur="$v.form.branch_id.$touch()"
                      item-text="name_en"
                      item-value="id"
                      label="Branch/Department*"
                    ></v-select>
                  </v-col>
                  <v-col cols="12" md="6">
                    <v-select
                      v-model="form.user_id"
                      :items="users"
                      :error-messages="applicableUserErrors"
                      @input="$v.form.user_id.$touch()"
                      @blur="$v.form.user_id.$touch()"
                      item-text="name"
                      item-value="id"
                      label="Applicable User*"
                      :rules="[rules.required]"
                    ></v-select>
                  </v-col>
                </v-row>
              </v-card-text>
            </v-card>
            <v-divider></v-divider>
            <v-card class="mx-auto" elevation="1">
              <v-card-text>
                <p class="text-h5 text--primary">Certificate Design</p>
                <v-row>
                  <v-col cols="12" sm="4">
                    <v-select
                      label="Page Layout*"
                      :items="form.layouts"
                      :error-messages="pageLayoutErrors"
                      @input="$v.form.page_layout.$touch()"
                      @blur="$v.form.page_layout.$touch()"
                      v-model="form.page_layout"
                    />
                  </v-col>
                  <v-col cols="12" sm="4">
                    <v-select
                      label="User Photo Style*"
                      :items="form.photoStyles"
                      v-model="form.user_photo_style"
                      :error-messages="userPhotoStyleErrors"
                      @input="$v.form.user_photo_style.$touch()"
                      @blur="$v.form.user_photo_style.$touch()"
                    />
                  </v-col>
                  <v-col cols="12" sm="4">
                    <v-text-field
                        v-model="form.photo_size"
                        :counter="100"
                        label="Photo Size"
                    ></v-text-field>
                  </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12" md="4">
                        <v-file-input
                            show-size
                            label="Signature Image"
                            v-model="form.signature_image"
                        ></v-file-input>
                    </v-col>
                    <v-col cols="12" md="4">
                      <v-file-input
                            show-size
                            label="Logo Image"
                            v-model="form.logo_image"
                        ></v-file-input>
                    </v-col>
                    <v-col cols="12" md="4">
                      <v-file-input
                            show-size
                            label="Background Image"
                            v-model="form.background_image"
                        ></v-file-input>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12" sm="3">
                        <v-text-field
                            v-model="form.layout_spacing_top"
                            :counter="100"
                            label="Layout Spacing Top (px)*"
                            :error-messages="spacingTopErrors"
                            @input="$v.form.layout_spacing_top.$touch()"
                            @blur="$v.form.layout_spacing_top.$touch()"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="3">
                        <v-text-field
                            v-model="form.layout_spacing_bottom"
                            :counter="100"
                            :error-messages="spacingBottomErrors"
                            @input="$v.form.layout_spacing_bottom.$touch()"
                            @blur="$v.form.layout_spacing_bottom.$touch()"
                            label="Layout Spacing Bottom (px)*"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="3">
                        <v-text-field
                            v-model="form.layout_spacing_left"
                            :counter="100"
                            :error-messages="spacingLeftErrors"
                            @input="$v.form.layout_spacing_left.$touch()"
                            @blur="$v.form.layout_spacing_left.$touch()"
                            label="Layout Spacing Left (px)*"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="3">
                        <v-text-field
                            v-model="form.layout_spacing_right"
                            :counter="100"
                            :error-messages="spacingRightErrors"
                            @input="$v.form.layout_spacing_right.$touch()"
                            @blur="$v.form.layout_spacing_right.$touch()"
                            label="Layout Spacing Right (px)*"
                        ></v-text-field>
                    </v-col>
                </v-row>
              </v-card-text>
            </v-card>
            <v-divider></v-divider>
            <v-card elevation="1" class="mx-auto">
                <v-card-text>
                    <p class="text-h5 text--primary">Certificate Content</p>
                    <vue-editor
                        v-model="form.certificate_content"
                        :editorToolbar="customToolbar"
                    ></vue-editor>
                    <div v-if="errors.name">
                        <span
                            style="color: red"
                            v-for="(error, index) in errors.certificate_content"
                            :key="index"
                            >{{ error }}
                        </span>
                    </div>
                </v-card-text>
            </v-card>
          </v-form>
          <v-spacer></v-spacer>
          <v-card-actions>
            <v-btn color="success" @click="submit"> Add </v-btn>
            <v-btn @click="clear"> clear </v-btn>
        </v-card-actions>
        <!-- </v-card-text> -->
      </div>
    </div>
  </div>
</template>

<script>
import { validationMixin } from "vuelidate";
import { VueEditor } from "vue2-quill-editor";
import {
  required,
  maxLength,
  minLength,
  email,
} from "vuelidate/lib/validators";
import Snackbar from "@/components/Snackbar";
import axios from "axios";

const API_ENDPOINTS = {
  //defined api in one place and your in action
  CERTIFICATE_TEMPLATES: "/api/certificate-templates",
  BRANCHES: "/api/branches",
  USERS: "/api/users",
};

export default {
  mixins: [validationMixin],
  props: {
    certificates: Object(),
  },
  components: {
    VueEditor,
  },
  validations: {
    form: {
      title: { required, maxLength: maxLength(100) },
      branch_id: { required },
      user_id: { required },
      page_layout: { required },
      user_photo_style: { required },
      layout_spacing_left:{ required, maxLength: maxLength(50) },
      layout_spacing_right: { required, maxLength: maxLength(50) },
      layout_spacing_top: { required, maxLength: maxLength(50) },
      layout_spacing_bottom: { required, maxLength: maxLength(50) },
    },
  },
  data() {
    return {
      errors: [],
      users: [],
      branches: [],
      form: {
        title: "",
        branch_id: null,
        certificate_content: "",
        user_id: null,
        layouts: ["A4 (Portrait)", "A4 (Landscape)"],
        page_layout: null,
        photoStyles: ["Square", "Round"],
        user_photo_style: null,
        photo_size: "",
        layout_spacing_left: "",
        layout_spacing_right: "",
        layout_spacing_top: "",
        layout_spacing_bottom: "",
        signature_image: null,
        logo_image: null,
        background_image: null,
      },
      rules: {
        required: (value) => !!value || "Required.",
      },
      customToolbar: [
        [{ header: [false, 1, 2, 3, 4, 5, 6] }],
        ["bold", "italic", "underline", "strike"], // toggled buttons
        [
          { align: "" },
          { align: "center" },
          { align: "right" },
          { align: "justify" },
        ],
        ["blockquote", "code-block"],
        [{ list: "ordered" }, { list: "bullet" }, { list: "check" }],
        [{ indent: "-1" }, { indent: "+1" }], // outdent/indent
        [{ color: [] }, { background: [] }], // dropdown with defaults from theme
        ["link", "image", "video"],
        ["clean"], // remove formatting button
      ],
    };
  },
  computed: {
    titleErrors() {
      const errors = [];
      if (!this.$v.form.title.$dirty) return errors;
      !this.$v.form.title.maxLength &&
        errors.push("Certificate title must be at most 100 characters long");
      !this.$v.form.title.required && errors.push("Certificate title is required.");
      return errors;
    },
    branchErrors() {
      const errors = [];
      if (!this.$v.form.branch_id.$dirty) return errors;
      !this.$v.form.branch_id.maxLength &&
        errors.push("Please choose branch.");
      !this.$v.form.branch_id.required && errors.push("The Branch field is required.");
      return errors;
    },
    applicableUserErrors() {
      const errors = [];
      if (!this.$v.form.user_id.$dirty) return errors;
      !this.$v.form.user_id.maxLength &&
        errors.push("Please choose Applicable user.");
      !this.$v.form.user_id.required && errors.push("The Applicable user is required.");
      return errors;
    },
    userPhotoStyleErrors() {
      const errors = [];
      if (!this.$v.form.user_photo_style.$dirty) return errors;
      !this.$v.form.user_photo_style.maxLength &&
        errors.push("Please choose Page Layout.");
      !this.$v.form.user_photo_style.required && errors.push("The Page Layout is required.");
      return errors;
    },
    pageLayoutErrors() {
      const errors = [];
      if (!this.$v.form.page_layout.$dirty) return errors;
      !this.$v.form.page_layout.maxLength &&
        errors.push("Please choose Page Layout.");
      !this.$v.form.page_layout.required && errors.push("The Page Layout is required.");
      return errors;
    },
    spacingLeftErrors() {
      const errors = [];
      if (!this.$v.form.layout_spacing_left.$dirty) return errors;
      !this.$v.form.layout_spacing_left.maxLength &&
        errors.push("Layout spacing left must be at most 50 characters long.");
      !this.$v.form.layout_spacing_left.required && errors.push("The Layout Spacing left is required.");
      return errors;
    },
    spacingRightErrors() {
      const errors = [];
      if (!this.$v.form.layout_spacing_right.$dirty) return errors;
      !this.$v.form.layout_spacing_right.maxLength &&
        errors.push("Layout spacing right must be at most 50 characters long.");
      !this.$v.form.layout_spacing_right.required && errors.push("The Layout Spacing right is required.");
      return errors;
    },
    spacingTopErrors() {
      const errors = [];
      if (!this.$v.form.layout_spacing_top.$dirty) return errors;
      !this.$v.form.layout_spacing_top.maxLength &&
        errors.push("Layout spacing top must be at most 50 characters long.");
      !this.$v.form.layout_spacing_top.required && errors.push("The Layout Spacing top is required.");
      return errors;
    },
    spacingBottomErrors() {
      const errors = [];
      if (!this.$v.form.layout_spacing_bottom.$dirty) return errors;
      !this.$v.form.layout_spacing_bottom.maxLength &&
        errors.push("Layout spacing bottom must be at most 50 characters long.");
      !this.$v.form.layout_spacing_bottom.required && errors.push("The Layout Spacing bottom is required.");
      return errors;
    },
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

    async submit() {
      this.$v.$touch();
      let isFormCorrect = this.$v.form.$invalid;
      if (!isFormCorrect) {
        const { Overlay, Snackbar } = this.$root;
        Overlay.on();

        const formData = new FormData();
            formData.append('signature_image', this.form.signature_image);
            formData.append('logo_image', this.form.logo_image);
            formData.append('background_image', this.form.background_image);
            _.each(this.form, (value, key) => {//foreach data form for past to forData
            formData.append(key, value)
            })
        try {
          const response = await axios.post(
            API_ENDPOINTS.CERTIFICATE_TEMPLATES, formData,
            {
              headers: {
                'Content-Type': 'multipath/form-data'
              }
            }
          );
          this.$emit("refresh");
          this.errors = {};
          Snackbar.show({
            message: response.data.message,
            snackColor: response.data.snackColor,
          });
          Overlay.off();
          this.clear();
        } catch (error) {
          if (error.response) {
            this.errors = error.response.data.errors;
            Snackbar.show({
              message: error.response.data.message,
              snackColor: "error",
            });
          } else {
            Snackbar.show({ message: error.message, snackColor: "error" });
          }
          Overlay.off();
        }
      }
    },
    clear() {
      this.$v.form.$reset();
      this.form.title = "";
      this.form.branch_id = null;
      this.form.user_id = null;
      this.form.layouts = "";
      this.form.page_layout = null;
      this.form.photoStyles = "";
      this.form.user_photo_style = null;
      this.form.photo_size = "";
      this.form.layout_spacing_bottom = "";
      this.form.layout_spacing_left = "";
      this.form.layout_spacing_right = "";
      this.form.signature_image = null;
      this.form.logo_image = null;
      this.form.background_image = null;
      this.form.certificate_content = "";
    },
  },
  created() {
    this.fetchBranches();
    this.fetchUsers();
  },
  watch: {},
};
</script>
