
<template class="pt-0 pb-0 mb-0 mt-0">
    <v-footer fixed padless class="pt-0 pb-0 mb-0 mt-0 footer-border-top">
        <v-col cols="2"></v-col>
        <v-col class="text-center" cols="5" style="padding-left: 28px">
            <v-card-text class="py-2 white--text text-center">
                <v-subheader class="pt-0 pb-0 mb-0 mt-0 subheader-height">© {{ new Date().getFullYear() }} — Westline
                    Education Group. All Rights Reserved.</v-subheader>
            </v-card-text>
        </v-col>
        <v-col cols="5" class="text-right pt-0 pb-0 mb-0 mt-0">
            <v-btn text x-small>
                Term & Condition
            </v-btn>
            <span class="text--disabled">|</span>
            <v-btn text x-small>
                Help
            </v-btn>
            <span class="text--disabled">|</span>
            <v-btn text x-small>
                Contact Us
            </v-btn>
        </v-col>
    </v-footer>
</template>

<style scoped>
.subheader-height {
    height: 0px !important;
}
.footer-border-top{
    border-top: 1px solid #E0E0E0;
}
</style>
