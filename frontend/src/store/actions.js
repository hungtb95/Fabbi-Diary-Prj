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
  retrieveProfile({ commit }, data) {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        "/api/profile/".concat(data.profileId),
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
  retrieveDiary({ commit }, data) {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        "/api/users/diary", {
          headers: {
            Authorization: "Bearer " + data.token,
            Accept: "application/json",
            "Content-Type": "application/json"
        }},
        res => {
          resolve(res);
        },
        err => {
          reject(err);
        }
      );
    });
  },
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
  GET_CONTENT_DIARY: ({ commit }) => {
    return new Promise((resolve, reject) => {
      apiCaller.getRequest(
        "/api/diaries",
        [],
        res => {
          commit("GET_CONTENT_DIARY", res.data);
        },
        err => {
          reject(err);
        }
      );
    });
  }
};
