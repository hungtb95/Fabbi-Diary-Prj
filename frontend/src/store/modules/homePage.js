/* eslint-disable */
import apiCaller from "../../utils/api";

const homePage = {
  namespaced: true,
  state: {
    contentDiary: []
  },
  getters: {},
  mutations: {
    getContentDiary: (state, payload) => {
      state.contentDiary = payload
      // console.log("state.contentDiary", state.contentDiary);
    }
  },
  actions: {
    createDiary: ({ commit }, data) => {
      return new Promise((resolve, reject) => {
        apiCaller.postRequest(
          "/api/diaries",
          data,
          res => {
            commit("createDiary");
          },
          err => {
            reject(err);
          }
        );
      });
    },
    getContentDiary: ({ commit }) => {
      return new Promise((resolve, reject) => {
        apiCaller.getRequest(
          "/api/diaries", '',
          res => {
            commit("getContentDiary", res.data);
          },
          err => {
            reject(err);
          }
        );
      });
    }
  }
};

export default homePage;
