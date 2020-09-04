<template>
  <b-container>
    <b-row class="justify-content-center">
      <div class="col-md-8 col-sm-10">

        <headerProfile
          v-bind:name="profile.full_name"
          v-bind:countDiaries="achivement.countDiaries"
          v-bind:countView="achivement.countView"
          v-bind:avatar="profile.avatar"
        />

        <b-card class="border-light">
          <b-card-header class="pb-4">
            <ul class="nav nav-tabs card-header-tabs">
              <li @click="changeNav(true)" class="active nav-item ml-4">
                <a>My diaries</a>
              </li>
              <li @click="changeNav(false)" class="nav-item ml-5">
                <a>Profile</a>
              </li>
            </ul>
          </b-card-header>
          <b-card-body>

            <div v-if="nav">
              <diaryCreate 
                v-bind:avatar="profile.avatar"
                v-bind:name="profile.name"
              />
              <diary v-for="diary in diaries"
                v-bind:key="diary.id"
                v-bind:comments="diary.comments"
                v-bind:avatar="diary.user.profile.avatar"
                v-bind:name="diary.user.profile.full_name"
                v-bind:content="diary.content"
              />
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
import Diary from "../components/Diary";
import DiaryCreate from "../components/DiaryCreate";
import HeaderProfile from "../components/HeaderProfile";


export default {
  name: "profile",
  components: {
    diary: Diary,
    diaryCreate: DiaryCreate,
    headerProfile: HeaderProfile
  },
  data() {
    return {
      profile: this.$store.state.profile,
      achivement: {
        countDiaries: this.$store.state.countDiaries,
        countView: this.$store.state.countView
      },
      diaries: this.$store.state.diaries,
      nav: true
    };
  },
  created() {
    this.fetchData();
    this.fetchDiary();
  },
  methods: {
    async fetchData() {
      await this.$store.dispatch("RETRIEVE_PROFILE", {
        profileId: this.$route.params.profileId
      })
    },
    async fetchDiary() {
      await this.$store.dispatch("RETRIEVE_DIARY", {
        token: this.$store.state.token
      })
    },
    changeNav(res) {
      this.nav = res;
    }
  }
};
</script>

