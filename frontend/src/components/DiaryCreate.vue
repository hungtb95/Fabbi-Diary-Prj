<template>
  <b-container class="create-form">
    <b-row class="form-body">
      <div class="avatar">
        <img src="https://via.placeholder.com/80" alt="avatar" />
      </div>
      <b-col class="content">
        <input type="text" placeholder="Create new diary..." name="content" v-model="content"/>
      </b-col>
    </b-row>
    <b-row class="option-content">
      <input type="file" accept="audio/*, video/*, image/*" ref="uploadFile" />
      <b-col cols="3" class="img-video option-item" @click="$refs.uploadFile.click()">Image/Video</b-col>
      <b-col cols="3" class="feeling option-item">Feeling/Active</b-col>
    </b-row>
    <b-row class="form-footer justify-content-end">
      <b-form-select v-model="mode" :options="options" class="mode"></b-form-select>
      <b-button class="btn-post" @click="createDiary()">Post</b-button>
    </b-row>
  </b-container>
</template>

<script>
export default {
  name: "DiaryCreate",
  data() {
    return {
      mode: 0,
      options: [
        { value: 2, text: "Private" },
        { value: 1, text: "Public" }
      ],
      content: ""
    };
  },
  methods: {
    async createDiary() {
      const request = {
        content: this.content,
        access_range: this.mode
      };
      this.$store.dispatch("createDiary", request);
    }
  }
};
</script>

<style lang="scss" scoped>
.create-form {
  border: 1px solid #0000002d;
  border-radius: 5px;
  background-color: #ffffff;
  min-width: 300px;
  .form-body {
    margin: 1rem 0 0 0;
    padding: 1rem 0;
    border-bottom: 1px solid #0000001f;
    .avatar img {
      border-radius: 100%;
      max-width: 80px;
      max-height: 80px;
    }
    .content input {
      width: 100%;
      height: 100%;
      border: none;
      &::placeholder {
        color: #0000005d;
      }
      &:focus {
        outline: none;
      }
    }
  }
  .option-content {
    border-bottom: 1px solid #0000001f;
    padding: 0.5rem 0;
    margin: 0;
    input[type="file"] {
      display: none;
    }
    .option-item {
      display: flex;
      margin-right: 1rem;
      background-color: #f1f1f1;
      min-height: 36px;
      min-width: 160px;
      align-items: center;
      justify-content: center;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: bold;
      &:hover {
        cursor: pointer;
        background-color: #dbdbdb;
      }
    }
  }
  .form-footer {
    margin: 0.5rem 0;
    .mode {
      width: 150px;
      margin-right: 1rem;
    }
  }
}
</style>
