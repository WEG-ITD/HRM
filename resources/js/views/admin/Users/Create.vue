<template>
    <div class="m-2" style="margin:auto">
      <div class="p-2">
        <!-- Add Module-->
        <v-card elevation="5">
          <v-card-text>
            <div v-if="errors" style="color:red">
              <div v-for="(err,i) in errors" :key="i">
                <div v-for="(e,index) in err" :key="index">{{i}}: {{e}}</div>
              </div>
            </div>
            <form @submit.prevent="submit">
                <v-card-title style="padding-bottom: 0" class="p-1">
                    <v-icon medium left color="#DF9D0E">mdi-home-assistant</v-icon>
                    <span class="title font-weight-light" style="color:#DF9D0E">Academic Details</span>
                    <v-divider style="background-color:#DF9D0E; width:100%;"></v-divider>
                </v-card-title>
                <v-card-text class="p-1">
                    <v-row class="p-0">
                        <v-col cols="12" md="4" class="pt-0 pb-0">
                            <v-select
                                v-model="form.school_id"
                                :items="schools"
                                item-value="id"
                                item-text="name_en"
                                required
                                label="On school / Head Office"
                            >
                            </v-select>
                        </v-col>
                        <v-col cols="12" md="4" class="pt-0 pb-0">
                            <v-combobox
                                v-model="form.role_id"
                                :items="listRole"
                                multiple
                                item-value="id"
                                item-text="name"
                                label="Role"
                                required
                            ></v-combobox>
                        </v-col>
                        <v-col cols="12" md="4" class="pt-0 pb-0">
                            <v-menu
                                v-model="form.joining_date"
                                :close-on-content-click="false"
                                :nudge-right="40"
                                transition="scale-transition"
                                offset-y
                                min-width="auto"
                            >
                                <template v-slot:activator="{ on, attrs }">
                                <v-text-field
                                    v-model="date"
                                    label="Joining Date"
                                    prepend-icon="mdi-calendar"
                                    readonly
                                    v-bind="attrs"
                                    v-on="on"
                                ></v-text-field>
                                </template>
                                <v-date-picker
                                v-model="date"
                                @input="form.joining_date = false"
                                ></v-date-picker>
                            </v-menu>
                        </v-col>
                    </v-row>
                    <v-row class="p-0">
                        <v-col cols="12" md="4" class="pt-0 pb-0">
                            <v-select
                                v-model="form.branch_id"
                                :items="branches"
                                item-value="id"
                                item-text="name_en"
                                required
                                label="Department / Branch*"
                            >
                            </v-select>
                        </v-col>
                        <v-col cols="12" md="4" class="pt-0 pb-0">
                            <v-select
                                v-model="form.position_id"
                                :items="positions"
                                item-value="id"
                                item-text="name_en"
                                required
                                label="Position*"
                            >
                            </v-select>
                        </v-col>
                        <v-col cols="12" md="4" class="pt-0 pb-0">
                            <v-text-field
                                v-model="form.total_experience"
                                :error-messages="$v.form.name.$errorMessages"
                                :counter="30"
                                label="Total Experience"
                                @input="$v.form.name.$touch()"
                                @blur="$v.form.name.$touch()"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row class="p-0">
                        <v-col cols="12" md="6" class="pt-0 pb-0">
                            <p class="font-weight-regular">Qualifications</p>
                            <v-textarea
                                outlined
                                rows="2"
                                name="input-7-4"
                                v-model="form.qualifications"
                                placeholder="Please enter employee qualification here..."
                            ></v-textarea>
                        </v-col>
                        <v-col cols="12" md="6" class="pt-0 pb-0">
                            <p class="font-weight-regular">Experience Details</p>
                            <v-textarea
                                outlined
                                rows="2"
                                name="input-7-4"
                                v-model="form.experience_details"
                                placeholder="Please enter employee experience detail here..."
                            ></v-textarea>
                        </v-col>
                    </v-row>
                </v-card-text>
                <v-card-title style="padding-bottom: 0" class="p-1">
                    <v-icon medium left color="#DF9D0E">mdi-account-plus-outline</v-icon>
                    <span class="title font-weight-light" style="color:#DF9D0E">Employee Details</span>
                    <v-divider style="background-color:#DF9D0E; width:100%;"></v-divider>
                </v-card-title>
                <v-card-text class="p-1 pt-5">
                    <v-row class="p-0">
                        <v-col cols="12" md="2" class="pt-0 pb-0">
                            <v-card class="profile-image-card">
                                <v-img :src="previewUrl" width="200" height="200" class="profile-image" @click="triggerFileInputDialog"></v-img>
                                <input type="file" ref="fileInput" style="display:none" @change="onFileSelected">
                                <v-btn color="primary" class="upload-button" @click="triggerFileInputDialog">Upload Image</v-btn>
                            </v-card>
                        </v-col>
                        <v-col cols="12" md="10" class="pt-0 pb-0">
                            <v-row class="p-0">
                                <v-col cols="12" md="6" class="pt-0 pb-0">
                                    <v-text-field
                                        v-model="form.firstname_en"
                                        :error-messages="$v.form.name.$errorMessages"
                                        :counter="30"
                                        label="English Firstname"
                                        required
                                        prepend-icon="mdi-account-outline"
                                        @input="$v.form.name.$touch()"
                                        @blur="$v.form.name.$touch()"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12" md="6" class="pt-0 pb-0">
                                    <v-text-field
                                        v-model="form.lastname_en"
                                        :error-messages="$v.form.name.$errorMessages"
                                        :counter="30"
                                        label="English Lastname"
                                        prepend-icon="mdi-account-outline"
                                        required
                                        @input="$v.form.name.$touch()"
                                        @blur="$v.form.name.$touch()"
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row class="p-0">
                                <v-col cols="12" md="6" class="pt-0 pb-0">
                                    <v-text-field
                                        v-model="form.firstname_kh"
                                        :error-messages="$v.form.name.$errorMessages"
                                        :counter="30"
                                        label="Khmer Firstname"
                                        prepend-icon="mdi-account-outline"
                                        required
                                        @input="$v.form.name.$touch()"
                                        @blur="$v.form.name.$touch()"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12" md="6" class="pt-0 pb-0">
                                    <v-text-field
                                        v-model="form.lastname_kh"
                                        :error-messages="$v.form.name.$errorMessages"
                                        :counter="30"
                                        label="Khmer Lastname"
                                        prepend-icon="mdi-account-outline"
                                        required
                                        @input="$v.form.name.$touch()"
                                        @blur="$v.form.name.$touch()"
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row class="p-0">
                                <v-col cols="12" md="6" class="pt-0 pb-0">
                                    <v-text-field
                                        v-model="form.user_name"
                                        :error-messages="$v.form.user_name.$errorMessages"
                                        :counter="7"
                                        :value="newStaffId"
                                        label="Staff Id"
                                        prepend-icon="mdi-id-card"
                                        required
                                        @input="$v.form.user_name.$touch()"
                                        @blur="$v.form.user_name.$touch()"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12" md="6" class="pt-0 pb-0">
                                    <v-text-field
                                        v-model="form.national_id"
                                        :error-messages="$v.form.name.$errorMessages"
                                        :counter="30"
                                        label="National ID"
                                        prepend-icon="mdi-account-box-outline"
                                        required
                                        @input="$v.form.name.$touch()"
                                        @blur="$v.form.name.$touch()"
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                    <v-row class="p-0">
                        <v-col cols="12" md="3" class="pt-0 pb-0">
                            <v-select
                                v-model="form.religion_id"
                                :items="religions"
                                item-value="id"
                                item-text="name_en"
                                required
                                label="Religion"
                            >
                            </v-select>
                        </v-col>
                        <v-col cols="12" md="3" class="pt-0 pb-0">
                            <v-select
                                v-model="form.blood_type"
                                :items="bloods"
                                item-value="id"
                                item-text="name_en"
                                required
                                label="Blood Group"
                            >
                            </v-select>
                        </v-col>
                        <v-col cols="12" md="3" class="pt-0 pb-0">
                            <v-select
                                v-model="form.gender"
                                :items="genders"
                                item-value="id"
                                item-text="name_en"
                                required
                                label="Gender"
                            >
                            </v-select>
                        </v-col>
                        <v-col cols="12" md="3" class="pt-0 pb-0">
                            <v-menu
                                ref="selectedDate"
                                v-model="selectedDate"
                                :close-on-content-click="false"
                                transition="scale-transition"
                                offset-y
                                min-width="auto"
                            >
                            <template v-slot:activator="{ on, attrs }">
                                <v-text-field
                                    v-model="form.birth_date"
                                    label="Birthday date"
                                    prepend-icon="mdi-calendar"
                                    readonly
                                    v-bind="attrs"
                                    v-on="on"
                                ></v-text-field>
                            </template>
                            <v-date-picker
                                v-model="form.birth_date"
                                :active-picker.sync="activePicker"
                                :max="(new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10)"
                                min="1950-01-01"
                            ></v-date-picker>
                            </v-menu>
                        </v-col>
                    </v-row>
                    <v-row class="p-0">
                        <v-col cols="12" md="4" class="pt-0 pb-0">
                            <v-text-field
                                v-model="form.phone"
                                :error-messages="$v.form.phone.$errorMessages"
                                :counter="10"
                                label="Phone number"
                                required
                                prepend-icon="mdi-phone-log-outline"
                                @input="$v.form.phone.$touch()"
                                @blur="$v.form.phone.$touch()"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="4" class="pt-0 pb-0">
                            <v-text-field
                                v-model="form.phone"
                                :error-messages="$v.form.phone.$errorMessages"
                                :counter="10"
                                label="Company phone number"
                                required
                                prepend-icon="mdi-phone-classic"
                                @input="$v.form.phone.$touch()"
                                @blur="$v.form.phone.$touch()"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="4" class="pt-0 pb-0">
                            <v-text-field
                                v-model="form.email"
                                :error-messages="$v.form.email.$errorMessages"
                                label="E-mail address"
                                required
                                prepend-icon="mdi-email-plus-outline"
                                @input="$v.form.email.$touch()"
                                @blur="$v.form.email.$touch()"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                </v-card-text>
                <v-card-title style="padding-bottom: 0" class="pr-1 pl-1">
                    <v-icon medium left color="#DF9D0E">mdi-account-plus-outline</v-icon>
                    <span class="title font-weight-light" style="color:#DF9D0E">Employee Address</span>
                    <v-divider style="background-color:#DF9D0E; width:100%;"></v-divider>
                </v-card-title>
                <v-card-text class="p-1 pt-5">
                    <v-row class="p-0">
                        <v-col cols="12" md="4" class="pt-0 pb-0">
                            <v-text-field
                                v-model="form.house_street"
                                :error-messages="$v.form.phone.$errorMessages"
                                :counter="10"
                                label="House & Street in Englis"
                                required
                                prepend-icon="mdi-home-map-marker"
                                placeholder="#9A, St. 370,"
                                @input="$v.form.phone.$touch()"
                                @blur="$v.form.phone.$touch()"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="4" class="pt-0 pb-0">
                            <v-text-field
                                v-model="form.house_street_kh"
                                :error-messages="$v.form.phone.$errorMessages"
                                :counter="10"
                                label="House & Street in Khmer"
                                required
                                prepend-icon="mdi-home-map-marker"
                                placeholder="ផ្ទះលេខ 9A, ផ្លូវលេខ​"
                                @input="$v.form.phone.$touch()"
                                @blur="$v.form.phone.$touch()"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" md="4" class="pt-0 pb-0">
                            <v-select
                                v-model="form.selectedCountry"
                                :items="countries"
                                item-value="id"
                                item-text="name_en"
                                label="Country"
                                prepend-icon="mdi-map-marker-radius-outline"
                                required
                                @input="fetchProvinces"                           
                            ></v-select>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="12" md="3">
                            <v-select
                                v-model="form.selectedProvince"
                                :items="provinces"
                                item-value="id"
                                item-text="name_en"
                                label="Province / Municipality"
                                prepend-icon="mdi-map-marker-radius-outline"
                                required
                                :disabled="!form.selectedCountry"
                                @change="fetchDistricts"
                                :error-messages="isProvinceDisabled ? ['Please select a country first.'] : []"
                            >
                            </v-select>
                        </v-col>
                        <v-col cols="12" md="3">
                            <v-select
                                v-model="form.selectedDistrict"
                                :items="districts"
                                item-value="id"
                                item-text="name_en"
                                label="District / Khan"
                                prepend-icon="mdi-map-marker-radius-outline"
                                required
                                :disabled="!form.selectedProvince"
                                @change="fetchCommunes"
                                :error-messages="isDistrictDisabled ? ['Please select a province first.'] : []"
                            >
                            </v-select>
                        </v-col>
                        <v-col cols="12" md="3">.
                            <v-select
                                v-model="form.selectedCommune"
                                :items="communes"
                                item-value="id"
                                item-text="name_en"
                                required
                                label="Communes / Sangkat"
                                prepend-icon="mdi-map-marker-radius-outline"
                                :disabled="!form.selectedDistrict"
                                @change="fetchVillages"
                                :error-messages="isCommuneDisabled ? ['Please select a district first.'] : []"
                            >
                            </v-select>
                        </v-col>
                        <v-col cols="12" md="3">
                            <v-select
                                v-model="form.selectedVillage"
                                :items="villages"
                                item-value="id"
                                item-text="name_en"
                                required
                                label="Village"
                                prepend-icon="mdi-map-marker-radius-outline"
                                :disabled="!form.selectedCommune"
                                :error-messages="isDistrictDisabled ? ['Please select a commune first.'] : []"
                            >
                            </v-select>
                        </v-col>
                    </v-row>
                </v-card-text>
              <v-text-field
                v-model="form.name"
                :error-messages="$v.form.name.$errorMessages"
                :counter="30"
                label="Name"
                required
                @input="$v.form.name.$touch()"
                @blur="$v.form.name.$touch()"
              ></v-text-field>
              <v-text-field
                v-model="form.password"
                :error-messages="$v.form.password.$errorMessages"
                label="Password"
                required
                :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                :type="show1 ? 'text' : 'password'"
                @click:append="show1 = !show1"
                @input="$v.form.password.$touch()"
                @blur="$v.form.password.$touch()"
              ></v-text-field>

              <v-btn color="success" class="mr-4" @click="submit">submit</v-btn>
              <v-btn @click="clear">clear</v-btn>
            </form>
          </v-card-text>
        </v-card>
      </div>
    </div>
  </template>

<script>
import { validationMixin } from "vuelidate";
import {
    required,
    maxLength,
    minLength,
    email,
} from "vuelidate/lib/validators";
import axios from "axios";

const API_ENDPOINTS = {
  //defined api in one place and your in action
  BRANCHES: "/api/branches",
  SCHOOLS: "/api/schools",
  POSITIONS: "/api/positions",
  RELIGIONS: "/api/religions",
  COUNTRIES: "/api/countries",
  PROVINCES: "/api/provinces",
  DISTRICTS: "/api/districts",
  COMMUNES: "/api/communes",
  VILLAGES: "/api/villages",
  ROLES: "/api/roles",
  USERS: "/api/users",
};
export default {
    mixins: [validationMixin],
    props: {
        user: Object(),
    },
    components: {

    },
    validations: {
        form:{
            name: { required, maxLength: maxLength(30) },
            phone: { required, maxLength: maxLength(10) },
            email: { required, email },
            password: { required,minLength: minLength(8) },
            user_name:{ required, maxLength: maxLength(7) },
        }
    },
    data() {
        return {
            show1:false,
            overlay: false,
            errors: {
                name: null,
            },
            selectedDate: null,
            activePicker: null,
            date: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
            form:{
                name: '',
                user_name: '',
                email: '',
                phone:'',
                password:'',
                role_id:[],
                branch_id: null,
                position_id: null,
                religion_id: null,
                location_id: null,
                school_id: null,
                firstname_en: '',
                lastname_en: '',
                firstname_kh: '',
                lastname_kh: '',
                birth_date: '',
                joining_date: null,
                qualifications: '',
                experience_details: '',
                total_experience: '',
                profile_picture: null,
                selectedCountry: null,
                selectedCountry: null,
                selectedProvince: null,
                selectedDistrict: null,
                selectedCommune: null,
                selectedVillage: null,
            },
            overlay: false,
            listRole: [],
            branches: [],
            countries: [],
            positions: [],
            schools: [],
            religions: [],
            provinces: [],
            districts: [],
            communes: [],
            villages: [],
            bloods: ['A+', 'A-', 'B+', 'O+'],
            genders: ['Male', 'Female'],
            selectedDate: '',

        };
    },
    
    mounted() {
        this.fetchCountries();
    },  
    
    methods: {
        async fetchBranches() {
            const response = await axios.get(API_ENDPOINTS.BRANCHES);
            this.branches = response.data.data;
        },
        async fetchSchools() {
            const response = await axios.get(API_ENDPOINTS.SCHOOLS);
            this.schools = response.data.data;
        },
        async fetchPositions() {
            const response = await axios.get(API_ENDPOINTS.POSITIONS);
            this.positions = response.data.data;
        },
        async fetchCountries() {
            const response =  await axios.get(API_ENDPOINTS.COUNTRIES);
            this.countries = response.data.data;
        },
        async fetchRoles() {
            const response = await axios.get(API_ENDPOINTS.ROLES);
            this.listRole = response.data.data.roles;
        },
        async fetchReligions() {
            const response = await axios.get(API_ENDPOINTS.RELIGIONS);
            this.religions = response.data.data;
        },
        async fetchProvinces() {
            await axios.get(API_ENDPOINTS.PROVINCES).then(response => {
                this.provinces = response.data.data;
            });
        },
        async fetchDistricts() {
            if (this.form.selectedProvince) {
                try {
                    const response = await axios.get(API_ENDPOINTS.DISTRICTS, {
                        params: {
                            province_id: this.form.selectedProvince
                        }
                });
                    this.districts = response.data.data;
                } catch (error) {
                    console.log(error);
                }
            }
        },
        async fetchCommunes() {
            if (this.form.selectedDistrict) {
                try {
                    const response = await axios.get(API_ENDPOINTS.COMMUNES, {
                        params: {
                            district_id: this.form.selectedDistrict
                        }
                    });
                    this.communes = response.data.data;
                }catch(error) {
                    console.log(error);
                }
            }
            // const response = await axios.get(API_ENDPOINTS.COMMUNES, {
            //     params: {
            //         district_id: this.selectedDistrict,
            //     }
            // }).then(response => {
            //     this.communes = response.data.data;
            // });
        },
        async fetchVillages() {
            const response = await axios.get(API_ENDPOINTS.VILLAGES, {
                params: {
                    commune_id: this.selectedCommune,
                }
            }).then(response => {
                this.villages = response.data.data;
            });
        },
        onFileSelected(event) {
            this.file = event.target.files[0];
            this.previewUrl = URL.createObjectURL(this.file);
        },
        triggerFileInputDialog() {
            this.$refs.fileInput.click();
        },
        submit() {
            this.$v.$touch();
            let isFormCorrect = this.$v.form.$invalid;

            const newData = {
                id: this.newStaffId,
                data: this.data
            };
            if (!isFormCorrect) {
                this.$root.Overlay.on();
                axios
                    .post("/api/users", this.form)
                    .then((response) => {
                        if (response) {
                            this.errors = null;
                            this.dataList.push(newData);
                            this.$emit('refresh');
                            this.$root.Snackbar.show({message: response.data.message,snackColor:response.data.snackColor,})
                            this.$root.Overlay.off();
                            this.clear();
                        }
                    })
                    .catch((error) => {
                        //console.log(error);
                        if(error.response){
                            this.errors = error.response.data.errors;
                            this.$root.Snackbar.show({message: error.response.data.message,snackColor:'error',})
                            this.$root.Overlay.off();
                        }else{
                            this.$root.Snackbar.show({message: error.message,snackColor:'error',})
                            this.$root.Overlay.off();
                        }

                    });
            }

        },
        clear() {
            this.$v.form.$reset();
            this.form.name = "";
            this.form.phone = "";
            this.form.password = "";
            this.form.email = '';
            this.form.password = '';
            this.form.user_name = '';
            this.form.role_id = [];
        },
    },
    computed: {
        previewUrl() {
            if (this.file) {
                return URL.createObjectURL(this.file)
            } else {
                return '/images/user.png'
            }
        },
        // generated new staff ID for NEW ADDED
        async newStaffId() {
            let staffList = [];
            try {
                // Make a GET request to the API endpoint to retrieve the staff data
                const response = await axios.get(API_ENDPOINTS.USERS);
                staffList = response.data.data;
                console.log(staffList);
            } catch (error) {
                console.log(error);
            }
            // Find the highest staff ID in the staff data
            const highestStaffId = staffList.reduce((maxId, staff) => {
                const staffId = parseInt(staff.userName.substring(1));
                return staffId > maxId ? staffId : maxId;
            }, 0);
            // Increment the highest staff ID by one and return the new staff ID
            const newStaffIdNum = highestStaffId + 1;
            const newStaffIdStr = 'W' + newStaffIdNum.toString().padStart(5, '0');
            console.log('Computing new staff ID', newStaffIdStr);
            return newStaffIdStr;
        },
        defaultCountry() {
            return this.countries.find(c => c.id === 38);
        },
        // isDistrictDisabled() {
        //     return !this.selectedProvince;
        // },
        // isProvinceDisabled() {
        //     return !this.selectedDistrict;
        // },
        isProvinceDisabled() {
            return !this.form.selectedCountry ? ['Please select a country first.'] : !this.form.selectedProvince ? ['Please select a province.'] : false;
        },
        isDistrictDisabled() {
            return !this.form.selectedProvince ? ['Please select a province first.'] : !this.form.selectedDistrict ? ['Please select a district.'] : false;
        },
        isCommuneDisabled(){
            return !this.form.selectedDistrict ? ['Please select a district first.'] : !this.form.selectedCommune ? ['Please select a village.'] : false;
        },
        isVillageDisabled(){
            return !this.form.selectedCommune ? ['Please select a commune first.'] : !this.form.selectedVillage ? ['Please select a village.'] : false;
        },
        nameErrors () {
            const errors = []
            if (!this.$v.form.name.$dirty) return errors
            !this.$v.form.name.maxLength && errors.push('Name must be at most 30 characters long')
            !this.$v.form.name.required && errors.push('Name is required.')
            return errors
        },
        phoneErrors () {
            const errors = []
            if (!this.$v.form.phone.$dirty) return errors
            !this.$v.form.phone.maxLength && errors.push('Phone must be at most 10 characters long')
            !this.$v.form.phone.required && errors.push('Phone is required.')
            return errors
        },
        staffErrors () {
            const errors = []
            if (!this.$v.form.user_name.$dirty) return errors
            !this.$v.form.user_name.maxLength && errors.push('User Name must be at most 7 characters long')
            !this.$v.form.user_name.required && errors.push('User Name is required.')
            return errors
        },
        emailErrors () {
            const errors = []
            if (!this.$v.form.email.$dirty) return errors
            !this.$v.form.email.email && errors.push('Must be valid e-mail')
            !this.$v.form.email.required && errors.push('E-mail is required')
            return errors
        },
        passwordErrors () {
            const errors = []
            if (!this.$v.form.password.$dirty) return errors
            !this.$v.form.password.minLength && errors.push('Password must be at least 8 characters long')
            !this.$v.form.password.required && errors.push('Password is required')
            return errors
        },
    },
    created() {
        this.fetchBranches();
        // this.fetchCountries();
        this.fetchPositions();
        this.fetchRoles();
        this.fetchSchools();
        this.fetchReligions();
        // this.fetchProvinces();
        // this.fetchDistricts();
        // this.fetchCommunes();
        // this.fetchVillages();
        this.selectedCountry = this.defaultCountry;
    },
    watch: {
        selectedDate (val) {
            val && setTimeout(() => (this.activePicker = 'YEAR'))
        },
        newStaffId() {
            this.$nextTick(() => {
                this.$refs.staffIdInput.$el.querySelector('input').value = this.newStaffId;
            });
        },
        // selectedProvince() {
        //     if (this.selectedProvince) {
        //         this.fetchDistricts();
        //     } else {
        //         this.districts = [];
        //         this.form.selectedDistrict = null;
        //     }
        // }
        selectedProvince() {
            this.selectedDistrict = null;
            this.fetchDistricts();
        }
    },
};
</script>
<style>
    .profile-image-card {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        overflow: hidden;
        margin: auto;
        cursor: pointer;
    }

    .profile-image {
        object-fit: cover;
        cursor: pointer;
    }

    .upload-button {
    margin-top: 10px;
    }
</style>
