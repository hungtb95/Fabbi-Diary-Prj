<template>
  <div class="container bg-login">
    <div class="row justify-content-center">
      <div class="col-md-8 col-sm-10">
        <div class="login-form card mt-5 mb-5 rounded-30">
          <h2 class="login-heading card-title mt-5 font-weight-bold">Signup</h2>
          <div class="card-body">
            <form action="#" @submit.prevent="signup">

              <div class="from-group row justify-content-center mt-5">
                <input class="form-control col-10 text-center shadow" id="email" type="text" name="email" v-model="email" placeholder="Email" autofocus>
              </div>

              <div class="from-group mb-more row justify-content-center mt-5">
                <input class="form-control col-10 text-center shadow" id="password" type="password" name="password" v-model="password" placeholder="Password">
              </div>

              <div class="from-group mb-more row justify-content-center mt-5">
                <input class="form-control col-10 text-center shadow" id="password" type="password" name="password" v-model="passConfirm" placeholder="Comfirm Password">
              </div>

              <div class="form-group row justify-content-center mt-5">
                <button type="submit" id="btn-login" class="btn-submit form-control col-10 text-center shadow font-weight-bold text-white">Signup</button>
              </div>

            </form>
            <div>
              <h6 v-if="showAlert" class="login-heading card-title mt-5 mb-5 font-weight-bold text-danger">Please confirm your password!!!<i class="fas fa-long-arrow-alt-right"></i></h6>
            </div>
            <div v-for="error in errors">
              <h6 class="login-heading card-title mt-5 mb-5 font-weight-bold text-danger">{{ error }}<i class="fas fa-long-arrow-alt-right"></i></h6>
            </div>
          </div>
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
      password: "",
      passConfirm: "",
      showAlert: false,
      errors: {}
    };
  },
  methods: {
    async signup() {
      if (this.validate() === true) {
        await this.$store.dispatch("RETRIEVE_TOKEN_REGISTER", {
          email: this.email,
          password: this.password
        }).then(() => {
          this.$router.push({ name: "Home" });
        }).catch(e => {
          this.errors = e.response.data.errors;
          this.showAlert = true;
        });
      } else {
        this.showAlert = true;
      }
    },
    validate() {
      if (this.password === this.passConfirm) {
        return true;
      }
      this.errors["password"] = "Password confirm not match";
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

