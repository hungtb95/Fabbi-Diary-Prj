<template>
  <div class="DetailDiaryPage">
    <Detail :diaryID="diaryID"></Detail>
  </div>
</template>

<script>
import Detail from "../components/DetailDiary";

export default {
  name: "DetailDiary",
  components: {
    Detail
  },
  data() {
    return {
      diaryID: this.$route.params.diaryID
    };
  }
};
</script>

<style lang="scss" scoped>
.DetailDiaryPage {
  height: 86vh;
  overflow-y: auto;
  overflow-x: hidden;
  margin-top: 10px;
}
</style>
