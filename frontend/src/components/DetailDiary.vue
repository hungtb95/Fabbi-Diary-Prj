<template>
  <b-container class="detail-diary">
    <b-form-group id="input-group-2" label="Title:" label-for="input-2">
      <b-form-input id="input-2" v-model="detailDiary.title" required placeholder="Enter name"></b-form-input>
    </b-form-group>
    <b-form-group id="input-group-2" label="Content :" label-for="input-2">
      <b-form-input id="input-2" required placeholder="Enter name" v-model="detailDiary.content"></b-form-input>
    </b-form-group>
    <b-row v-if="detailDiary.image" class="image-diary-row">
      <b-img
        :src="'http://localhost:8000/images/image/' + detailDiary.image"
        fluid-grow
        alt="Responsive image"
        class="image-diary-content"
      ></b-img>
    </b-row>
    <b-form-group
      label="Upload Image"
      label-for="file-small"
      label-cols-sm="2"
      label-size="sm"
      class="upload-file"
    >
      <b-form-file
        multiple
        id="file-small"
        size="sm"
        accept="image/jpeg image/png"
        @change="getimageLink($event)"
      ></b-form-file>
    </b-form-group>
    <b-row class="row-mode">
      <b-form-select v-model="detailDiary.access_range" :options="options" class="mode"></b-form-select>
    </b-row>
    <b-button variant="success" class="update-button" @click="updateDiary()">Update Diary</b-button>
  </b-container>
</template>

<script>
export default {
  props: {
    diaryID: String
  },
  data() {
    return {
      detailDiary: Object,
      options: [
        { value: 2, text: "Private" },
        { value: 1, text: "Public" }
      ],
      imageLink: ""
    };
  },
  methods: {
    getDetailDiary() {
      const request = {
        diaryID: this.diaryID
      };

      this.$store
        .dispatch("detailDiary/getDetailDiary", request)
        .then(res => {
          this.detailDiary = res.data;
        });
    },
    updateDiary() {
      const request = {
        diaryID: this.diaryID,
        access_range: this.detailDiary.access_range,
        title: this.detailDiary.title,
        content: this.detailDiary.content,
        image: this.imageLink
      };

      this.$store.dispatch("detailDiary/updateDetailDiary", request).then(res => {
        this.getDetailDiary();
      });
    },
    getimageLink(e) {
      const file = new FileReader();
      file.readAsDataURL(e.target.files[0]);
      file.onload = e => {
        this.imageLink = e.target.result;
      };
    }
  },
  created() {
    this.getDetailDiary();
  }
};
</script>

<style lang="scss" scoped>
.detail-diary {
  height: 86vh;
  margin-top: 10px;
  .title {
    margin-top: 10px;
    .title-input::placeholder {
      color: black;
    }
  }
  .content {
    .content-area {
      overflow-y: auto;
      overflow-x: hidden;
    }
    .content-area::-webkit-scrollbar {
      width: 0px;
    }
    .content-area::placeholder {
      color: black;
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
  .row-mode {
    margin-top: 1rem;
    .mode {
      margin-bottom: 10px;
      margin-left: 60rem;
      width: 10rem;
    }
  }
  .update-button {
    margin-bottom: 5rem;
  }
  .upload-file {
    margin-top: 1rem;
  }
}
</style>
