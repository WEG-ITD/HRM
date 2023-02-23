<template>
    <v-form ref="form" v-model="valid">
      <v-card>
        <v-card-title>{{ title }}</v-card-title>
        <v-card-text>
          <v-container>
            <v-row v-for="(field, index) in fields" :key="index">
              <v-col cols="12" md="4">
                <v-text-field
                  v-if="field.type === 'text'"
                  v-model="form[field.name]"
                  :label="field.label"
                  :rules="[rules.required]"
                ></v-text-field>
                <v-select
                  v-else-if="field.type === 'select'"
                  :items="field.options"
                  v-model="form[field.name]"
                  :label="field.label"
                  :rules="[rules.required]"
                ></v-select>
                <v-checkbox
                  v-else-if="field.type === 'checkbox'"
                  v-model="form[field.name]"
                  :label="field.label"
                ></v-checkbox>
                <v-radio-group
                  v-else-if="field.type === 'radio'"
                  v-model="form[field.name]"
                  :label="field.label"
                  :rules="[rules.required]"
                >
                  <v-radio
                    v-for="(option, i) in field.options"
                    :key="i"
                    :label="option.label"
                    :value="option.value"
                  ></v-radio>
                </v-radio-group>
                <v-textarea
                  v-else-if="field.type === 'textarea'"
                  v-model="form[field.name]"
                  :label="field.label"
                ></v-textarea>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-btn :disabled="!valid" color="primary" @click="submit">Submit</v-btn>
          <v-btn color="secondary" @click="reset">Reset</v-btn>
        </v-card-actions>
      </v-card>
    </v-form>
  </template>

  <script>
  export default {
    name: 'Form',
    props: {
      title: {
        type: String,
        default: ''
      },
      fields: {
        type: Array,
        required: true,
        default: () => [],
        validator: (fields) => {
          return fields.every((field) => {
            return field.hasOwnProperty('name') && field.hasOwnProperty('label') && field.hasOwnProperty('type');
          });
        }
      }
    },
    data() {
      return {
        form: {},
        valid: true,
        rules: {
          required: (value) => !!value || 'Required.'
        }
      };
    },
    methods: {
      submit() {
        if (this.$refs.form.validate()) {
          this.$emit('submit', this.form);
        }
      },
      reset() {
        this.$refs.form.reset();
      }
    }
  };
  </script>
