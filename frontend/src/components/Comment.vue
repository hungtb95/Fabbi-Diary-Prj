<template>
  <b-container class="box-comment">
    <b-row class="comment" v-for="comment in comments">
      <b-img
        class="cmt-avatar"
        rounded="circle"
        alt="Circle image"
        :src="comment.user.profile.avatar"
      ></b-img>
      <div>
        <p class="name-user-comment">
          <b>{{comment.user.profile.last_name + " " +comment.user.profile.first_name}}</b>
        </p>
        <p class="content-comment">{{comment.content}}</p>
      </div>
    </b-row>
    <b-row class="comment-user">
      <b-img class="cmt-avatar" rounded="circle" alt="Circle image" :src="userProfile.avatar"></b-img>
      <input
        type="text"
        v-model="contentComment"
        placeholder="Write your comment"
        class="content-comment"
        @keypress.enter="createComment(diaryID)"
      />
    </b-row>
  </b-container>
</template>

<script>
export default {
  props: {
    comments: Array,
    userProfile: Object,
    diaryID: Number
  },
  data() {
    return {
      contentComment: ""
    };
  },
  methods: {
    createComment(diaryID) {
      const request = {
        diary_id: diaryID,
        content: this.contentComment
      };
      this.$store.dispatch("homePage/createComment", request);
    }
  }
};
</script>

<style lang="scss" scoped>
.box-comment {
  border-bottom: 0;
  padding: 8px 0;
  .comment {
    margin-left: 0px;
    margin-right: 0px;
    .cmt-avatar {
      float: left;
    }
    .name-user-comment {
      margin-left: 10px;
      margin-bottom: 0.5rem;
    }
    .content-comment {
      margin-left: 10px;
      text-align: left;
    }
  }
  .comment-user {
    margin-left: 0px;
    margin-right: 0px;
    .content-comment {
      height: 2.5rem;
      width: 65rem;
      margin-left: 10px;
      margin-top: 5px;
    }
  }
}
</style>
