<template>
    <v-app-bar app >
    <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
    <v-toolbar-title>Management Information System</v-toolbar-title>
    <v-spacer></v-spacer>
    <div style="margin-top:16px;padding-top:4px">
        <v-switch
        v-model="$vuetify.theme.dark"
        @change="themeChange()"
        label="Dark Mode"
        ></v-switch>
    </div>
    <span class="pa-md-4 mx-lg-auto">
        <v-icon right>mdi-account-circle</v-icon>
        <span> {{ user.name }}</span>
    </span>
    <v-btn color="blue-grey darken-2" @click.native="logout">
        <span>LOGOUT</span>
        <v-icon right>mdi-exit-to-app</v-icon>
    </v-btn>
</v-app-bar>

</template>
