import Vue from "vue";
import Router from "vue-router";
import routes from "@/router/routes";
import store from "../store";

Vue.use(Router);

const router = new Router({
  mode: "history",
  routes
});

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (!store.getters.loggedIn) {
      next({
        path: "login"
      });
    } else {
      next();
    }
  } else if (to.matched.some(record => record.meta.requiresVisitor)) {
    if (store.getters.loggedIn) {
      next({
        path: "home"
      });
    } else {
      next();
    }
  } else {
    next();
  }
});

export default router;
