<template>
  <div class="active tab-pane">
  <diaryNew></diaryNew>
  <comment
    v-for="comment in comments"
    :key="comment.id"
    :content="comment.content"
    :name="comment.user.profile.last_name"
    :time="comment.content"
  />

  <input @keyup.enter=createComment() class="form-control input-sm" type="text" placeholder="Type a comment">
  </div>
</template>

<script>
import Comments from "./Comment.vue";
import DiaryNew from "./DiaryNews.vue";

export default {
  name: "diary",
  props: {
    comments: Array
  },
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

