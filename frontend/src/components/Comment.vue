<template>
  <div class="row">
    <img class="img-circle img-sm col-2" src="" alt="User Image">

    <div class="col-9 text-left">
      <span class="username">
        <a class="font-weight-bold" v-text="name"></a>
        <span class="text-muted float-right small">8:03 PM Today</span>
      </span>
      <div v-text="content"></div>
    </div>
  </div>
</template>

<script>
export default {
  name: "comment",
  props: {
    'content': String,
    'name': String
  },
  methods: {

  }
};
</script>

<style scoped>

</style>

