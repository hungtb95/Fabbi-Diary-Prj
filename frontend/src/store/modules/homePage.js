/* eslint-disable */
import apiCaller from "../../utils/api";
import api from "../../utils/api";

const homePage = {
  namespaced: true,
  state: {
    contentDiary: []
  },
  mutations: {},
  actions: {
    createDiary: ({ commit }, data) => {
      return new Promise((resolve, reject) => {
        apiCaller.postRequest(
          "/api/diaries",
          data,
          res => {
            resolve(res);
          },
          err => {
            reject(err);
          }
        );
      });
    },
    getContentDiary: ({ commit }, data) => {
      return new Promise((resolve, reject) => {
        apiCaller.getRequest(
          "/api/diaries?title=" + data.title,
          "",
          res => {
            resolve(res);
          },
          err => {
            reject(err);
          }
        );
      });
    },
    like: ({ commit }, data) => {
      return new Promise((resolve, reject) => {
        apiCaller.postRequest(
          "/api/diaries/reaction",
          data,
          res => {
            resolve(res);
          },
          err => {
            reject(err);
          }
        );
      });
    },
    createComment: ({ commit }, data) => {
      return new Promise((resolve, reject) => {
        apiCaller.postRequest(
          "/api/comments",
          data,
          res => {
            resolve(res);
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
