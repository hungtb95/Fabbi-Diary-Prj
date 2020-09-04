<template>
  <b-container>
    <div class="row justify-content-center">
      <div class="col-md-8 col-sm-10">
        <h2 class="font-weight-bold mt-5 mb-5">Profile Information</h2>
        <form class="form-horizontal" @submit.prevent="update()" enctype="multipart/form-data">
          <div class="form-group row">
            <label class="col-sm-2 font-weight-bold">First Name</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="first_name" placeholder="First name" v-model="profile.first_name">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 control-label font-weight-bold">Last name</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="last_name" placeholder="Last name" v-model="profile.last_name">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 control-label font-weight-bold">Birthday</label>

            <div class="col-sm-10">
              <datepicker v-model="profile.birthday" name="birthday" format="dd-MM-yyyy" placeholder="Select time"></datepicker>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 control-label font-weight-bold">Phone number</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="phone" placeholder="Ex: 0915262999" v-model="profile.phone">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 control-label font-weight-bold">Address</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="address" placeholder="Address" v-model="profile.address">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 control-label font-weight-bold">Country</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="country" placeholder="Country" v-model="profile.country">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 control-label font-weight-bold">Avatar</label>

            <div class="col-sm-10">
              <label v-text="profile.avatar" class="float-left"></label>
              <input type="file" @change="onFileSelected" name="avatar" placeholder="Avatar">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-danger">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </b-container>
</template>

<script>
import Datepicker from "vuejs-datepicker";

export default {
  name: "updateProfile",
  components: {
    datepicker: Datepicker
  },
  created() {
    this.fetchData();
  },
  data() {
    return {
      profile: {
        first_name: this.$store.state.profile.first_name,
        last_name: this.$store.state.profile.last_name,
        birthday: this.$store.state.profile.birthday,
        address: this.$store.state.profile.address,
        phone: this.$store.state.profile.phone_number,
        avatar: this.$store.state.profile.avatar
      },
    };
  },
  methods: {
    async fetchData() {
      await this.$store.dispatch("RETRIEVE_PROFILE", {
        profileId: this.$route.params.profileId
      })
    },
    async update() {
      await this.$store.dispatch("UPDATE_PROFILE", {
        token: this.$store.state.token,
        first_name: this.profile.first_name,
        last_name: this.profile.last_name,
        birthday: this.profile.birthday,
        address: this.profile.address,
        phone_number: this.profile.phone,
        avatar: this.profile.avatar
      })
        .then(() => {
          this.$router.push("/home");
        });
    },
    onFileSelected(e) {
      const fileReader = new FileReader();
      fileReader.readAsDataURL(e.target.files[0]);
      fileReader.onload = e => {
        this.image.avatar = e.target.result;
      };
    }
  },
  // computed: {
  //   profile() {
  //     return this.$store.state.profile
  //   }
  // },
};
</script>

<style scoped>
</style>

