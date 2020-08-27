import Vue from "vue";
import Vuex from "vuex";
import mutations from "./mutations";
import actions from "./actions";
import getters from "./getters";
import exampleModule from "./modules/exampleModule";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    token: localStorage.getItem("access_token") || null,
    profileId: localStorage.getItem("profileId") || null,
  },
  mutations,
  actions,
  getters,
  modules: {
    exampleModule
  }
});
