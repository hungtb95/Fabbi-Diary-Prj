// eslint-disable-next-line no-unused-vars
function page(path) {
  return () => import(`@/pages/${path}`).then(m => m.default || m);
}

function component(path) {
  return () => import(`@/components/${path}`).then(m => m.default || m);
}

export default [
  {
    path: "/",
    name: "HelloWorld",
    component: component("HelloWorld")
  },
  {
    path: "/home",
    name: "Home",
    component: page("Home"),
    meta: {
      requiresAuth: true
    }
  },
  {
    path: "/login",
    name: "Login",
    component: page("Auth/Login"),
    meta: {
      requiresVisitor: true
    }
  },
  {
    path: "/register",
    name: "Register",
    component: page("Auth/Register"),
    meta: {
      requiresVisitor: true
    }
  },
  {
    path: "/logout",
    name: "LogOut",
    component: page("Auth/Logout")
  },
  {
    path: "/profile/:profileId",
    name: "Profile",
    component: page("Profile"),
    meta: {
      requiresAuth: true
    }
  },
  {
    path: "/update/profile/:profileId",
    name: "UpdateProfile",
    component: page("UpdateProfile"),
    meta: {
      requiresAuth: true
    }
  }
];
