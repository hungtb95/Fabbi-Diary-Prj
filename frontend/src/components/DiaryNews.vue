<template>
  <b-container class="diary-new">
    <div class="diary-new-content">
      <b-row class="avatar">
        <b-img rounded="circle" alt="Circle image" :src="'http://localhost:8000/images/avatar/'+avatar"></b-img>
        <div class="name-user">
          <p class="name font-weight-bold" v-text="name"></p>
          <p class="time">17 gio truoc</p>
        </div>
      </b-row>
      <b-row class="content-diary-row">
        <p class="content-diary" v-text="content"></p>
      </b-row>
      <b-row class="image-diary-row">
        <b-img
          src="https://picsum.photos/1024/400/?image=41"
          fluid-grow
          alt="Responsive image"
          class="image-diary-content"
        ></b-img>
      </b-row>
      <b-row class="like-cmt-amount">
        <font-awesome-icon icon="heart" class="icon heart" />
        <span class="number">15</span>
        <font-awesome-icon icon="comment-dots" class="icon cmt" />
        <span class="number">15</span>
      </b-row>
      <b-row class="like-cmt-share">
        <div class="content-like-cmt-share">
          <button class="like button">
            <font-awesome-icon icon="thumbs-up" class="icon" />Like
          </button>
          <button class="cmt button">
            <font-awesome-icon icon="comment-dots" class="icon" />Comment
          </button>
          <button class="share button">
            <font-awesome-icon icon="share-alt-square" class="icon" />Share
          </button>
        </div>
      </b-row>
    </div>
  </b-container>
</template>

<script>
import { mapState } from "vuex";

export default {
  data() {
    return {};
  },
  props: ["avatar", "name", "content"],
  methods: {
    getContentDiary() {
      this.$store.dispatch("GET_CONTENT_DIARY");
    }
  },
  created() {
    this.getContentDiary();
  },
  mounted() {
  },
  computed: {
    ...mapState("homePage", ["contentDiary"])
    // contentDiary() {
    //   return this.$store.state.contentDiary;
    // }
  }
};
</script>

<style lang="scss" scoped>
.diary-new {
  margin-top: 10px;
  border: solid 1px #0000002d;
  background-color: white;
  min-width: 300px;
  height: 65vh;
  .diary-new-content {
    .avatar {
      margin-top: 10px;
      .name-user {
        margin-left: 7px;
        .name {
          margin-bottom: 5px;
        }
        .time {
          margin-bottom: 5px;
          float: left;
        }
      }
    }
    .content-diary-row {
      margin-left: 0px;
    }
    .image-diary-row {
      margin-right: 0px;
      margin-left: 0px;
      width: 100%;
      .image-diary-content {
        margin-left: 0px;
      }
    }
    .like-cmt-amount {
      margin-top: 10px;
      .icon {
        margin-right: 5px;
        margin-left: 15px;
        width: 1.5rem;
        height: 1.5rem;
      }
      .number {
        width: 1.5rem;
        height: 1.5rem;
      }
      .heart {
        color: palevioletred;
      }
      .cmt {
        color: slateblue;
      }
    }
    .like-cmt-share {
      .content-like-cmt-share {
        width: 85%;
        margin: auto;
        .button {
          font-size: 1.3rem;
          background-color: white;
          border: white 0px;
          .icon {
            margin-right: 10px;
          }
        }
        .like {
          width: 20%;
          margin-right: 60px;
        }
        .cmt {
          width: 20%;
          margin-right: 60px;
        }
        .share {
          width: 20%;
        }
      }
    }
  }
}
</style>
