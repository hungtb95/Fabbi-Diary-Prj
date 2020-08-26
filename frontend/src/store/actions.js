import apiCaller from "../utils/api";

export default {
  DEMO_CALL_API: ({ commit }, payload) => {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        "/api/test",
        payload,
        res => {
          commit("SET_DEMO", res.data);
        },
        err => {
          reject(err);
        }
      );
    });
  },
  retrieveToken({ commit }, credentials) {
    return new Promise((resolve, reject) => {
      apiCaller.postRequest(
        "/api/login",
        credentials,
        res => {
          const token = res.data.data.original.access_token;
          localStorage.setItem("access_token", token);
          commit("GET_TOKEN", token);
          resolve(res);
        },
        err => {
          reject(err);
        }
      );
    });
  }
};
