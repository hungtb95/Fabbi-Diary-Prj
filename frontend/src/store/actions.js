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
  RETRIEVE_TOKEN: ({ commit }, credentials) => {
    return new Promise((resolve, reject) => {
      apiCaller.postRequest(
        "/api/login",
        credentials,
        res => {
          const token = res.data.data.token.original.access_token;
          const profileId = res.data.data.profileId;
          localStorage.setItem("access_token", token);
          localStorage.setItem("profileId", profileId);
          commit("SET_TOKEN", token);
          commit("SET_PROFILEID", profileId);
          resolve(res);
        },
        err => {
          reject(err);
        }
      );
    });
  },
  DESTROY_TOKEN: ({ commit }, credentials) => {
    return new Promise((resolve, reject) => {
      apiCaller.postRequest(
        "/api/logout",
        credentials,
        res => {
          localStorage.removeItem("access_token");
          localStorage.removeItem("profileId");
          commit("DESTROY_TOKEN");
          commit("DESTROY_PROFILEID");
          resolve(res);
        },
        err => {
          localStorage.removeItem("access_token");
          localStorage.removeItem("profileId");
          commit("DESTROY_TOKEN");
          commit("DESTROY_PROFILEID");
          reject(err);
        }
      );
    });
  },
  RETRIEVE_TOKEN_REGISTER({ commit }, credentials) {
    return new Promise((resolve, reject) => {
      apiCaller.postRequest(
        "/api/register",
        credentials,
        res => {
          const token = res.data.data.token.original.access_token;
          const profileId = res.data.data.profileId;
          localStorage.setItem("access_token", token);
          localStorage.setItem("profileId", profileId);
          commit("SET_TOKEN", token);
          commit("SET_PROFILEID", profileId);
          resolve(res);
        },
        err => {
          reject(err);
        }
      );
    });
  },
  RETRIEVE_PROFILE({ commit }, data) {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        "/api/profile/".concat(data.profileId),
        [],
        res => {
          commit("SET_PROFILE", res.data.data.profile);
          commit("SET_COUNT_DIARIES", res.data.data.countDiaries);
          commit("SET_COUNT_VIEW", res.data.data.countView);
        },
        err => {
          reject(err);
        }
      );
    });
  },
  RETRIEVE_DIARY({ commit }, data) {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        "/api/users/diary", {
          headers: {
            Authorization: "Bearer ".concat(data.token),
            Accept: "application/json",
            "Content-Type": "application/json"
          } },
        res => {
          commit("SET_DIARIES", res.data)
          resolve(res);
        },
        err => {
          reject(err);
        }
      );
    });
  },
  CREATE_DIARY: ({ commit }, data) => {
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
  GET_CONTENT_DIARY: ({ commit }) => {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        "/api/diaries",
        [],
        res => {
          resolve(res);
        },
        err => {
          reject(err);
        }
      );
    });
  },
  UPDATE_PROFILE: ({ commit }, data) => {
    return new Promise((resolve, reject) => {
      apiCaller.putRequest(
        "/api/profile/".concat(this.state.profileId),
        data,
        res => {
          commit('UPDATE_PROFILE', data);
        },
        err => {
          reject(err);
        }
      );
    });
  }
};
