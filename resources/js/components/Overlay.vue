<template>
  <v-overlay :opacity="0.3" :value="overlay">
          <v-progress-circular indeterminate size="64">
          </v-progress-circular>
    </v-overlay>
</template>

<script>
export default {
    data () {
        return {
            overlay:false,
        }
    },
    methods:{
        on() {
            this.overlay = true
        },
        off() {
            this.overlay = false
        }
    },
}
</script>

<style>

</style>