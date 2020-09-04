<template>
  <div class="active tab-pane">
  <diaryNew
    v-bind:avatar="this.avatar"
    v-bind:name="this.name"
    v-bind:content="this.content"
  />
  <comment
    v-for="comment in comments"
    v-bind:key="comment.id"
    v-bind:content="comment.content"
    v-bind:name="comment.user.profile.last_name"
    v-bind:time="comment.content"
  />

  <input @keyup.enter=createComment() class="form-control input-sm" type="text" placeholder="Type a comment">
  </div>
</template>

<script>
import Comments from "./Comment";
import DiaryNew from "./DiaryNews";

export default {
  name: "diary",
  props: ["comments", "avatar", "name", "content"],
  components: {
    comment: Comments,
    diaryNew: DiaryNew
  },
  methods: {
    createComment() {

    }
  }
};
</script>

<style scoped>

</style>

