<template>
  <header>
    <div>
      <b-navbar toggleable="lg" type="light" class="layout-header">
        <b-navbar-brand href="#">
          <img src="../assets/diaryLogo.png" />
        </b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
          <b-navbar-nav>
            <b-nav-item @click="homePath()">Home</b-nav-item>
            <b-nav-item @click="profilePath()">Profile</b-nav-item>
          </b-navbar-nav>

          <!-- Right aligned nav items -->
          <b-navbar-nav class="ml-auto">
            <b-nav-item-dropdown text="Lang" right>
              <b-dropdown-item href="#">EN</b-dropdown-item>
              <b-dropdown-item href="#">VN</b-dropdown-item>
              <b-dropdown-item href="#">JP</b-dropdown-item>
            </b-nav-item-dropdown>
            <b-nav-item-dropdown right>
              <!-- Using 'button-content' slot -->
              <template v-slot:button-content>
                <span>User</span>
              </template>
              <b-dropdown-item v-if="loggedIn" @click="settingPath()">Setting</b-dropdown-item>
              <router-link class="dropdown-item" v-if="loggedIn" to="/logout">Logout</router-link>
              <router-link class="dropdown-item" v-if="!loggedIn" to="/login">Login</router-link>
              <router-link class="dropdown-item" v-if="!loggedIn" to="/register">Register</router-link>
            </b-nav-item-dropdown>
          </b-navbar-nav>
        </b-collapse>
      </b-navbar>
    </div>
  </header>
</template>

<script>
export default {
  methods: {
    homePath() {
      this.$router.push("/home");
    },
    profilePath() {
      if (this.$store.state.profileId !== null) {
        this.$router.push("/profile/".concat(this.$store.state.profileId));
      }
    },
    settingPath() {
      this.$router.push("/update/profile/".concat(this.$store.state.profileId));
    }
  },
  computed: {
    loggedIn() {
      return this.$store.getters.loggedIn;
    }
  }
};
</script>

<style>
.layout-header{
  background-color: #f1f1f1;
}

img {
  width: 50px;
  height: 50px;
  margin-left: 1rem;
}
</style>
