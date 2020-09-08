import Vue from "vue";
import Vuex from "vuex";
import mutations from "./mutations";
import actions from "./actions";
import getters from "./getters";
import homePage from "./modules/homePage";
import detailDiary from "./modules/detailDiary";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    exampleState: "example nè",
    exampleData: null
  },
  mutations,
  actions,
  getters,
  modules: {
    homePage,
    detailDiary
  }
});
