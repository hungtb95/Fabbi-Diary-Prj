<template>
  <div class="HomePage">
    <DiaryCreate></DiaryCreate>
    <DiaryNews></DiaryNews>
  </div>
</template>

<script>
import DiaryCreate from "../components/DiaryCreate";
import DiaryNews from "../components/DiaryNews";

export default {
  name: "HomePage",
  components: {
    DiaryCreate,
    DiaryNews
  }
};
</script>

<style>
.HomePage {
  height: 86vh;
  overflow-y: auto;
  overflow-x: hidden;
  margin-top: 10px;
}
</style>
