<template>
  <div id="app">
    <Header/>
    <router-view />
    <Footer />
  </div>
</template>

<script>
import Header from "./layouts/Header";
import Footer from "./layouts/Footer";

export default {
  name: "App",
  components: {
    Header,
    Footer
  }
};
</script>

<style>
body {
  padding: 0px;
  margin: 0px;
  box-sizing: border-box;
}
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
