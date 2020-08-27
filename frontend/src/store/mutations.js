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
  DESTROY_TOKEN(state) {
    state.token = null;
  },
  DESTROY_PROFILEID(state) {
    state.profileId = null;
  }
};
