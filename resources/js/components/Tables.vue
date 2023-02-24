<template>
    <v-card>
      <v-card-title>
        {{ title }}
      </v-card-title>
      <v-card-text>
        <v-data-table
          :headers="headers"
          :items="items"
          :search="search"
          :rows-per-page-items="[10, 20, 50]"
          :rows-per-page-text="'Rows per page'"
          :page-text="'Page'"
          :loading="loading"
          :server-items-length="totalItems"
          :footer-props="{ itemsPerPageOptions: [10, 20, 50] }"
          @update:page="updatePage"
          @update:items-per-page="updatePerPage"
          @update:search="updateSearch"
          @click:row="rowClicked"
        >
          <template v-for="field in fields" v-slot:[`item.${field.name}`]="{ item }">
            {{ item[field.name] }}
          </template>
        </v-data-table>
      </v-card-text>
    </v-card>
  </template>

  <script>
  export default {
    name: 'Table',
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
            return field.hasOwnProperty('name') && field.hasOwnProperty('label');
          });
        }
      },
      items: {
        type: Array,
        required: true,
        default: () => []
      },
      totalItems: {
        type: Number,
        required: true,
        default: 0
      },
      loading: {
        type: Boolean,
        default: false
      }
    },
    data() {
      return {
        search: '',
        page: 1,
        itemsPerPage: 10
      };
    },
    computed: {
      headers() {
        return this.fields.map((field) => {
          return {
            text: field.label,
            value: field.name
          };
        });
      }
    },
    methods: {
      updatePage(newPage) {
        this.page = newPage;
        this.$emit('update:page', newPage);
      },
      updatePerPage(newPerPage) {
        this.itemsPerPage = newPerPage;
        this.$emit('update:items-per-page', newPerPage);
      },
      updateSearch(newSearch) {
        this.search = newSearch;
        this.$emit('update:search', newSearch);
      },
      rowClicked(row) {
        this.$emit('row-clicked', row);
      }
    }
  };
  </script>
