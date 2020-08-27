<template>
  <b-container>
    <b-row class="justify-content-center">
      <div class="col-md-8 col-sm-10">

        <headerProfile 
          v-bind:name="profile.name" 
          v-bind:countDiaries="this.achivement.countDiaries" 
          v-bind:countView="this.achivement.countView"
          v-bind:avatar="this.profile.avatar"
        />

        <b-card class="border-light">
          <b-card-header class="pb-4">
            <ul class="nav nav-tabs card-header-tabs">
              <li @click="changeNav(true)" class="active nav-item ml-4">
                <a>My diariesdiaries</a>
              </li>
              <li @click="changeNav(false)" class="nav-item ml-5">
                <a>Profile</a>
              </li>
            </ul>
          </b-card-header>
          <b-card-body>

            <div v-if="nav">
              <diaryCreate></diaryCreate>
              <diary v-for="diary in diaries" v-bind:key="diary.id" v-bind:comments="diary.comments"></diary>
            </div>

            <div v-if="!nav" class="tab-pane" id="settings">
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th></th>
                    <th>About</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(value,index) in profile" v-bind:key="index">
                    <th v-text="index"></th>
                    <td v-text="value"></td>
                  </tr>
                </tbody>
              </table>
            </div>

          </b-card-body>
        </b-card>

      </div>
    </b-row>
  </b-container>
</template>

<script>
import axios from "axios";
import Diary from "../components/Diary.vue";
import DiaryCreate from "../components/DiaryCreate.vue";
import HeaderProfile from "../components/HeaderProfile.vue";


export default {
  name: "profile",
  components: {
    diary: Diary,
    diaryCreate: DiaryCreate,
    headerProfile: HeaderProfile
  },
  data() {
    return {
      profile: {
        name: "",
        birthday: "",
        address: "",
        phone: ""
      },
      image: {
        avatar: "",
        coverImg: ""
      },
      achivement: {
        countDiaries: "",
        countView: ""
      },
      diaries: {

      },
      nav: true
    };
  },
  created() {
    this.fetchData();
    this.fetchDiary();
  },
  methods: {
    async fetchData() {
      await this.$store.dispatch("retrieveProfile", {
        profileId: this.$route.params.profileId
      })
        .then(res => {
          this.fillData(res);
        });
    },
    async fetchDiary() {
      await this.$store.dispatch("retrieveDiary", {
        token: this.$store.state.token
      })
        .then(res => {
          this.diaries = res.data
        });
    },
    fillData(res) {
      this.profile.name = res.data.data.profile.first_name + " " + res.data.data.profile.last_name;
      this.profile.birthday = res.data.data.profile.birthday;
      this.profile.address = res.data.data.profile.address;
      this.profile.phone = res.data.data.profile.phone_number;
      this.profile.country = res.data.data.profile.country;

      this.image.avatar = res.data.data.profile.avatar;
      this.image.coverImg = res.data.data.profile.coverImg;

      this.achivement.countDiaries = res.data.data.countDiaries;
      this.achivement.countView = res.data.data.countView;
    },
    changeNav(res) {
      this.nav = res;
    }
  }
};
</script>

<style scoped>
</style>

