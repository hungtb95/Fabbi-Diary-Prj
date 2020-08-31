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
            <b-nav-item href="#">Home</b-nav-item>
            <b-nav-item href="#">Profile</b-nav-item>
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
              <b-dropdown-item href="#">Setting</b-dropdown-item>
              <b-dropdown-item href="#">Sign In</b-dropdown-item>
              <b-dropdown-item href="#">Log Out</b-dropdown-item>
              <b-dropdown-item href="#">Log In</b-dropdown-item>
            </b-nav-item-dropdown>
          </b-navbar-nav>
        </b-collapse>
      </b-navbar>
    </div>
  </header>
</template>
<script>
export default {
  data() {
    return {};
  },
  methods: {},
  mounted() {}
};
</script>

<style>
.layout-header {
  background-color: #f1f1f1;
}

img {
  width: 50px;
  height: 50px;
  margin-left: 1rem;
}
</style>
