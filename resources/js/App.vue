<template>
  <v-app app>
    <Navbar/>
    <v-main style="position:relative">
      <div :style="{
        'background-image': `url(${require('/images/background/hrbg2.jpg')})`,
        'background-position': 'center center',
        'background-repeat':  'no-repeat',
        'background-attachment': 'fixed',
        'background-size':  'cover',
        'position':'absolute',
        'left':'0',
        'right':'0',
        'top':'0',
        'bottom':'0',
        'opacity':'0.1',
      }"></div>
        <router-view></router-view>
      <Snackbar ref="Snackbar">
      </Snackbar>
      <v-divider></v-divider>
    </v-main>
    <Footer/>
    <Overlay ref="Overlay">
    </Overlay>
  </v-app>
</template>
<script>
import Navbar from "./components/Navbar.vue";
import Footer from "./components/Footer.vue";
import Snackbar from "@/components/Snackbar";
import Overlay from "@/components/Overlay";
Vue.prototype.$api_url = "https://123.123.123:9999"//declare global variable. use it in vue like 'this.$api_url'
export default {
  name: "App",
  components: {
    Navbar,
    Footer,
    Snackbar,
    Overlay,
  },
   data: () => ({
   }),
  mounted() {
    this.$root.Snackbar = this.$refs.Snackbar
    this.$root.Overlay = this.$refs.Overlay
  },
  methods: {


  }
};
</script>
