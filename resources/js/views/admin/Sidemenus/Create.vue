<template>
    <div class="m-1" style="margin:auto">
        <div class="p-3">
            <!-- Add Module-->
            <template>
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
                <v-btn color="success" @click="submit"> Add </v-btn>
                <v-btn @click="clear"> clear </v-btn>
            </template>



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
import Snackbar from "@/components/Snackbar";
import axios from "axios";
export default {
    mixins: [validationMixin],
    props: {
        modules:Array(),
        sidemenus:Array(),
    },
    components: {
    },
    validations: {
        form:{
            name: { required },
            module: {  },
            type: { required },
            icon: { required },
            ordering: { required },
            parentId:{required}
        }
    },
    data() {
        return {
            errors:[],
            types:[
                {id:0,name:'Group'},
                {id:1,name:'Item'},
            ],

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
        };
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
            let a=this.sidemenus;
            a.push({id:0,name:'Root',type:0});
            return a.filter(x=>x.type==0);
        }
    },
    methods: {
        submit() {
            this.$v.$touch();
            let isFormCorrect = this.$v.form.$invalid;
            // you can show some extra alert to the user or just leave the each field to show it's `$errors`.
            if (!isFormCorrect) {
                this.$root.Overlay.on();
                axios
                .post("/api/sidemenus", this.form)
                .then((response) => {
                    //console.log(response);
                    if (response) {
                        this.$emit("refresh");
                        this.errors.name = null;
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
            this.form.is_main = false;
            this.form.have_workflow = false;
        },
    },
    watch: {},
};
</script>
