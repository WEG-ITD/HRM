<template>
  <div class="form-group"></div>
</template>

<script>
export default {
  created() {
    this.$store.dispatch("destroyToken").then(response => {
      //console.log(response);
      this.$router.push({ name: "adminLogin" });
    });
  }
};
</script>