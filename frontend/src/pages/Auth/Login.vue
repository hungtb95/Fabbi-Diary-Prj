<template>
  <div class="container bg-login">
    <div class="row justify-content-center">
      <div class="col-md-8 col-sm-10">
        <div class="login-form card mt-5 mb-5 rounded-30">
          <h2 class="login-heading card-title mt-5 mb-5 font-weight-bold">Login</h2>
          <div class="card-body">
            <form action="#" @submit.prevent="login">

              <div class="from-group row justify-content-center mt-5">
                <input class="form-control col-10 text-center shadow" id="email" type="email" name="email" v-model="email" placeholder="Email">
              </div>

              <div class="from-group mb-more row justify-content-center mt-5">
                <input class="form-control col-10 text-center shadow" id="password" type="password" name="password" v-model="password" placeholder="Password">
              </div>

              <div class="form-group row justify-content-center mt-5">
                <button type="submit" id="btn-login" class="btn-submit form-control col-10 text-center shadow font-weight-bold text-white">Login</button>
              </div>

              <div class="form-group row justify-content-end">
                <button @click="forgotPassword" class="btn form-control col-6 text-center ">Forgot <span class="text-primary">password?</span></button>
              </div>

            </form>
          </div>
          <h6 class="login-heading card-title mt-5 mb-5 font-weight-bold">Create new account <i class="fas fa-long-arrow-alt-right"></i></h6>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "login",
  data() {
    return {
      email: "",
      password: ""
    };
  },
  methods: {
    login() {
      this.$store.dispatch("retrieveToken", {
        email: this.email,
        password: this.password
      }).then(() => {
        this.$router.push({ name: "Home" });
      });
    },
    forgotPassword() {
    }
  }
};
</script>

<style scoped>
.bg-login {
  background-color: rgb(238,224,224);
}
#btn-login {
  background: linear-gradient(to left, #33ccff 0%, #000099 100%)
}
</style>

