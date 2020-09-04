<template>

</template>

<script>
export default {
  name: "logout",
  created() {
    this.signOut();
  },
  methods: {
    signOut() {
      this.destroyToken();
    },
    destroyToken() {
      this.$store.dispatch("DESTROY_TOKEN", {
        token: this.$store.state.token
      }).then(() => {
        this.$router.push("/login");
      });
    }
  }
};
</script>

<style scoped>
</style>

