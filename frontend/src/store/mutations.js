export default {
  SET_EXAMPLE_STATE: (state, status) => {
    state.exampleState = status;
  },
  SET_DEMO: (state, data) => {
    state.exampleData = data;
  },
  SET_TOKEN(state, token) {
    state.token = token;
  },
  DESTROY_TOKEN(state) {
    state.token = null;
  },
  SET_PROFILEID(state, profileId) {
    state.profileId = profileId;
  },
  DESTROY_PROFILEID(state) {
    state.profileId = null;
  },
  SET_PROFILE(state, profile) {
    state.profile = profile;
  },

  SET_COUNT_DIARIES(state, countDiaries) {
    state.countDiaries = countDiaries;
  },
  SET_COUNT_VIEW(state, countView) {
    state.countView = countView;
  },

  SET_DIARIES(state, diaries) {
    state.diaries = diaries;
  },

  UPDATE_PROFILE(state, data) {
    state.profile = data;
  },
  ADD_NEW_DIARY_USER(state, diaryNew) {
    state.diaryNew = diaryNew;
  },
  DESTROY_NEW_DIARY_USER(state, diaryNew) {
    state.diaryNew = null;
  },
};
