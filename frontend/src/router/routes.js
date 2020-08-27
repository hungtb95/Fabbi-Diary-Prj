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
  }
];
