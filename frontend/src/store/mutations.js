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
  DESTROY_TOKEN(state) {
    state.token = null;
  }
};
