<template>
  <b-container>
    <b-row class="justify-content-center">
      <div class="col-md-8 col-sm-10">

        <headerProfile 
          :name="profile.last_name" 
          :countDiaries="this.$store.state.countDiaries" 
          :countView="this.$store.state.countView"
          :avatar="profile.avatar"
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
              <diary v-for="diary in diaries" :key="diary.id" :comments="diary.comments"></diary>
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
                  <tr v-for="(value,index) in profile" :key="index">
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
      nav: true
    };
  },
  created() {
    this.fetchData();
    this.fetchDiary();
  },
  methods: {
    async fetchData() {
      await this.$store.dispatch("RETRIEVE_PROOFILE", {
        profileId: this.$route.params.profileId
      })
    },
    async fetchDiary() {
      await this.$store.dispatch("RETRIEVE_DIARY", {
        token: this.$store.state.token
      })
    }
  },
  computed: {
    profile() {
      return this.$store.state.profile;
    },
    diaries() {
      return this.$store.state.diaries;
    }
  },
};
</script>

<style scoped>
</style>

