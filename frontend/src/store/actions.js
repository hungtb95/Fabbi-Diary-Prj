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
  }
};
