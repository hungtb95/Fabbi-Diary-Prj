export default {
  SET_EXAMPLE_STATE: (state, status) => {
    state.exampleState = status;
  },
  SET_DEMO: (state, data) => {
    state.exampleData = data;
  },
  GET_TOKEN(state, token) {
    state.token = token;
  }
};
