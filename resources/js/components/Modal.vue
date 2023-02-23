<template>
    <v-dialog v-model="dialog" max-width="500px">
        <v-card>
            <v-card-title>
                <span class="headline">{{ title }}</span>
            </v-card-title>
            <v-card-text>
                <Form v-bind:fields="formFields" v-on:submit="submit"></Form>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
                <v-btn color="blue darken-1" text @click="submit">Save</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
import Form from '@/components/Form.vue';

export default {
    name: 'Modal',
    components: {
        Form,
    },
    props: {
        title: {
            type: String,
            default: '',
        },
        formFields: {
            type: Array,
            required: true,
            default: () => [],
        },
    },
    data() {
        return {
            dialog: false,
            formData: {},
        };
    },
    methods: {
        open(formData) {
            this.formData = formData;
            this.dialog = true;
        },
        close() {
            this.dialog = false;
        },
        submit() {
            this.$emit('submit', this.formData);
            this.dialog = false;
        },
    },
};
</script>
