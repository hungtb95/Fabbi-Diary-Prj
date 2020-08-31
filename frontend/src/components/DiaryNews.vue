<template>
  <b-container class="diary-new">
    <b-form-input
      v-model="searchTitle"
      placeholder="Enter your title you want to search"
      class="search-form"
      @keypress.enter="getContentDiary()"
    ></b-form-input>
    <div class="diary-new-content" v-for="diary in diaries">
      <b-row class="avatar">
        <b-img rounded="circle" alt="Circle image" :src="diary.profile.avatar" class="avatar-img"></b-img>
        <div class="name-user">
          <p class="name">
            <b>{{diary.profile.last_name + " " + diary.profile.first_name}}</b>
          </p>
          <p class="time">{{formatDate(diary.created_at)}}</p>
        </div>
        <div class="drop-down">
          <b-dropdown id="dropdown-1" text="" class="m-md-2">
            <b-dropdown-item>Edit Diary</b-dropdown-item>
          </b-dropdown>
        </div>
      </b-row>
      <b-row class="title-diary-row">
        <i>
          <a href="/detaildiary" class="title-link">
            <p class="title-diary">{{diary.title}}</p>
          </a>
        </i>
      </b-row>
      <b-row class="content-diary-row">
        <p class="content-diary">{{diary.content}}</p>
      </b-row>
      <b-row class="image-diary-row">
        <b-img :src="diary.image" fluid-grow alt="Responsive image" class="image-diary-content"></b-img>
      </b-row>
      <b-row class="like-cmt-amount">
        <font-awesome-icon icon="heart" class="icon heart" />
        <span class="number">{{diary.reaction_diary.length}}</span>
        <font-awesome-icon icon="comment-dots" class="icon cmt" />
        <span class="number">{{diary.comments.length}}</span>
      </b-row>
      <b-row class="like-cmt-share">
        <div class="content-like-cmt-share">
          <button class="like button" @click="like(diary.id)">
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
      <b-row>
        <Comments :comments="diary.comments" :userProfile="diary.profile" :diaryID="diary.id"></Comments>
      </b-row>
    </div>
  </b-container>
</template>

<script>
import moment from "moment";
import Comments from "../components/Comment";

export default {
  components: {
    Comments
  },
  data() {
    return {
      diaries: [],
      searchTitle: ""
    };
  },
  methods: {
    getContentDiary() {
      const data = {
        title: this.searchTitle
      };
      this.$store.dispatch("homePage/getContentDiary", data).then(res => {
        this.diaries = res.data;
      });
    },
    formatDate(date) {
      return moment(date, "YYYYMMDD").fromNow();
    },
    like(diaryId) {
      const request = {
        diaryID: diaryId
      };
      this.$store.dispatch("homePage/like", request);
    }
  },
  created() {
    this.getContentDiary();
  }
};
</script>

<style lang="scss" scoped>
.diary-new {
  margin-top: 10px;
  border: solid 1px #0000002d;
  background-color: white;
  min-width: 300px;
  .search-form {
    margin-top: 10px;
  }
  .diary-new-content {
    border-bottom: solid 1px #d2d2d2;
    .avatar {
      margin-right: 0px;
      margin-left: 0px;
      margin-top: 10px;
      .avatar-img {
        margin-left: 0px;
        width: 75px;
        height: 75px;
      }
      .name-user {
        font-size: large;
        margin-left: 7px;
        .name {
          margin-top: 0.5rem;
          margin-bottom: 5px;
        }
        .time {
          margin-top: 0.5rem;
          margin-bottom: 5px;
          float: left;
        }
      }
      .drop-down{
        margin-left: 54rem;
      }
    }
    .title-diary-row {
      font-size: larger;
      margin-left: 0px;
      .title-link {
        text-decoration: none;
        color: black;
      }
    }
    .content-diary-row {
      margin-left: 0px;
      .content-diary {
        font-size: larger;
      }
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
      margin-top: 20px;
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
      margin-top: 30px;
      border-top: solid 1px #d2d2d2;
      border-bottom: solid 1px #d2d2d2;
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
