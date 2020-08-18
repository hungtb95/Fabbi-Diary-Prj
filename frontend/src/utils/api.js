import axios from "axios";

const SERVER_BASE_URL = process.env.BASE_URL;
const http = axios.create({
  headers: {
    "Content-Type": "application/json"
  }
});

const postRequest = function (url, data, resolve, reject) {
  const requestUrl = SERVER_BASE_URL + url;
  http
    .post(requestUrl, data)
    .then(res => {
      resolve(res);
    })
    .catch(error => {
      reject(error);
    });
};

const getRequest = function (url, data, resolve, reject) {
  const requestUrl = SERVER_BASE_URL + url;
  http
    .get(requestUrl, data)
    .then(res => {
      resolve(res);
    })
    .catch(error => {
      reject(error);
    });
};

const putRequest = function (url, data, resolve, reject) {
  const requestUrl = SERVER_BASE_URL + url;
  http
    .put(requestUrl, data)
    .then(res => {
      resolve(res);
    })
    .catch(error => {
      reject(error);
    });
};

const patchRequest = function (url, data, resolve, reject) {
  const requestUrl = SERVER_BASE_URL + url;
  http
    .patch(requestUrl, data)
    .then(res => {
      resolve(res);
    })
    .catch(error => {
      reject(error);
    });
};

const deleteRequest = function (url, data, resolve, reject) {
  const requestUrl = SERVER_BASE_URL + url;
  http
    .delete(requestUrl, data)
    .then(res => {
      resolve(res);
    })
    .catch(error => {
      reject(error);
    });
};

export default {
  getRequest,
  postRequest,
  putRequest,
  patchRequest,
  deleteRequest
};
