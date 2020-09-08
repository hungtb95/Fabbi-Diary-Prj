// eslint-disable-next-line no-unused-vars
function page(path) {
  return () => import(`@/pages/${path}`).then(m => m.default || m);
}

// function component(path) {
//   return () => import(`@/components/${path}`).then(m => m.default || m);
// }

export default [
  {
    path: "/homepage",
    name: "HomePage",
    component: page("HomePage")
  },
  {
    path: "/detaildiary/:diaryID",
    name: "DetailDiaryPage",
    component: page("DetailDiaryPage"),
    props: true
  }
];
