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
    path: "/homepage",
    name: "HomePage",
    component: page("HomePage")
  },
  {
    path: "/detaildiary",
    name: "DetailDiary",
    component: page("DetailDiary")
  }
];
