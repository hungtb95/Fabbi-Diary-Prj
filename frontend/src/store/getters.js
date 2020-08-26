export default {
  GET_EXAMPLE_STATE: state => state.exampleState,
  loggedIn(state) {
    return state.token !== null;
  }
};
