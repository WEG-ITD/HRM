<template>
     <v-snackbar
        v-if="message&&snackbar"
        v-model="snackbar"
        top
        timeout="4000"
        :color="snackColor"
        right
    >
        <v-icon v-if="snackColor=='success'" dark large>mdi-check-circle</v-icon>
        <v-icon v-else dark large>mdi-exclamation-thick</v-icon>
            {{ message }}
        <template v-slot:action="{ attrs }">
            <v-btn
                icon
                v-bind="attrs"
                @click="snackbar = false"
            >
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </template>
    </v-snackbar>
</template>

<script>
export default {
    props:{

    },
    computed:{

    },
    data () {
        return {
            message:'',
            snackColor:'success',
            snackbar:false,
        }
    },
    methods:{
        show(data) {
            this.message = data.message || 'missing "message".'
            this.snackColor = data.snackColor || 'success'
            this.snackbar = true
        }
    },
    watch:{
        snackbar:function(){
            if(this.snackbar==false){
                this.$emit('resetSnackbar');
            }
        }
    }
}
</script>
