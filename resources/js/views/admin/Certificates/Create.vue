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
                  :error-messages="nameEnErrors"
                  :counter="100"
                  label="Certificate title"
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
                      item-text="name_en"
                      item-value="id"
                      label="Branch"
                      :rules="[rules.required]"
                    ></v-select>
                  </v-col>
                  <v-col cols="12" md="6">
                    <v-select
                      v-model="form.user_id"
                      :items="users"
                      item-text="name"
                      item-value="id"
                      label="Applicable User"
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
                      label="Page Layout"
                      :items="form.layouts"
                      v-model="form.page_layout"
                      :rules="[rules.required]"
                    />
                  </v-col>
                  <v-col cols="12" sm="4">
                    <v-select
                      label="User Photo Style"
                      :items="form.photoStyles"
                      v-model="form.user_photo_style"
                      :rules="[rules.required]"
                    />
                  </v-col>
                  <v-col cols="12" sm="4">
                    <v-text-field
                        v-model="form.photo_size"
                        :error-messages="nameEnErrors"
                        :counter="100"
                        label="Photo Size"
                        @input="$v.form.photo_size.$touch()"
                        @blur="$v.form.photo_size.$touch()"
                    ></v-text-field>
                  </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12" md="4">
                        <v-file-input
                            show-size
                            label="Signature Image"
                            v-model="form.signature_image"
                            @input="$v.form.signature_image.$touch()"
                            @blur="$v.form.signature_image.$touch()"
                        ></v-file-input>
                    </v-col>
                    <v-col cols="12" md="4"></v-col>
                    <v-col cols="12" md="4"></v-col>
                </v-row>
                <v-row>
                    <v-col cols="12" sm="3">
                        <v-text-field
                            v-model="form.layout_spacing_top"
                            :counter="100"
                            label="Layout Spacing Top (px)"
                            @input="$v.form.layout_spacing_top.$touch()"
                            @blur="$v.form.layout_spacing_top.$touch()"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="3">
                        <v-text-field
                            v-model="form.layout_spacing_bottom"
                            :error-messages="nameEnErrors"
                            :counter="100"
                            label="Layout Spacing Bottom (px)"
                            @input="$v.form.layout_spacing_bottom.$touch()"
                            @blur="$v.form.layout_spacing_bottom.$touch()"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="3">
                        <v-text-field
                            v-model="form.layout_spacing_left"
                            :error-messages="nameEnErrors"
                            :counter="100"
                            label="Layout Spacing Left (px)"
                            @input="$v.form.layout_spacing_left.$touch()"
                            @blur="$v.form.layout_spacing_left.$touch()"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="3">
                        <v-text-field
                            v-model="form.layout_spacing_right"
                            :error-messages="nameEnErrors"
                            :counter="100"
                            label="Layout Spacing Right (px)"
                            @input="$v.form.layout_spacing_right.$touch()"
                            @blur="$v.form.layout_spacing_right.$touch()"
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
    branches: Array(),
    users: Array(),
  },
  components: {
    VueEditor,
  },
  validations: {
    form: {
      title: { required, maxLength: maxLength(100) },
    },
  },
  data() {
    return {
      errors: [],
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
    nameEnErrors() {
      const errors = [];
      if (!this.$v.form.title.$dirty) return errors;
      !this.$v.form.title.maxLength &&
        errors.push("title must be at most 30 characters long");
      !this.$v.form.title.required && errors.push("title is required.");
      return errors;
    },
    nameKhErrors() {
      const errors = [];
      if (!this.$v.form.name_kh.$dirty) return errors;
      !this.$v.form.name_kh.maxLength &&
        errors.push("Name_kh must be at most 30 characters long");
      !this.$v.form.name_kh.required && errors.push("Name_kh is required.");
      return errors;
    },
    codeErrors() {
      const errors = [];
      if (!this.$v.form.code.$dirty) return errors;
      !this.$v.form.code.maxLength &&
        errors.push("code must be at most 30 characters long");
      !this.$v.form.code.required && errors.push("code is required.");
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
        try {
          const response = await axios.post(
            API_ENDPOINTS.CERTIFICATE_TEMPLATES, this.form, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
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
      this.form.name_kh = "";
      this.form.code = "";
      this.form.certificate_content = "";
      this.form.school_id = null;
    },
  },
  created() {
    this.fetchBranches();
    this.fetchUsers();
  },
  watch: {},
};
</script>
