const exampleModule = {
  namespaced: true,
  state: {
    example: "example module"
  },
  getters: {
    GET_EXAMPLE_MODULE: state => {
      return state.example;
    }
  },
  mutations: {
    SET_EXAMPLE_MODULE: (state, value) => {
      state.example = value;
    }
  }
};

export default exampleModule;
