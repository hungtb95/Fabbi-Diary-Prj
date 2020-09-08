/* eslint-disable */
import apiCaller from "../../utils/api";

const detailDiary = {
  namespaced: true,
  state: {},
  mutations: {},
  actions: {
    getDetailDiary: ({ commit }, data) => {
      return new Promise((resolve, reject) => {
        apiCaller.getRequest(
          "/api/diaries/" + data.diaryID,
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
    updateDetailDiary: ({ commit }, data) => {
      return new Promise((resolve, reject) => {
        apiCaller.putRequest(
          "/api/diaries/" + data.diaryID,
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

export default detailDiary;
