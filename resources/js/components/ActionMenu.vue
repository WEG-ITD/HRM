<template>
    <v-menu bottom offset-y>
      <template v-slot:activator="{ on, attrs }">
        <v-btn class="ma-2" icon tile v-bind="attrs" v-on="on">
          <v-icon>mdi-menu</v-icon>
        </v-btn>
      </template>
      <v-list dense>
        <v-list-item-group>
          <v-list-item v-if="canView" @click="openViewDialog">
            <v-list-item-icon>
              <v-icon>mdi-eye</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>View</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>
        <v-list-item-group>
          <v-list-item v-if="canUpdate" @click="openEditDialog">
            <v-list-item-icon>
              <v-icon>mdi-pencil</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>Edit</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>
        <v-list-item-group>
          <v-list-item v-if="canDelete" @click="openDialogConfirmation">
            <v-list-item-icon>
              <v-icon>mdi-delete</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>Delete</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-menu>
  </template>

  <script>
  export default {
    props: {
      item: Object,
      canView: Boolean,
      canUpdate: Boolean,
      canDelete: Boolean
    },
    methods: {
      openViewDialog() {
        this.$emit('open-view-dialog', this.item);
      },
      openEditDialog() {
        this.$emit('open-edit-dialog', this.item);
      },
      openDialogConfirmation() {
        this.$emit('open-dialog-confirmation', this.item);
      }
    }
  };
  </script>
