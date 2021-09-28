
import Vue from "vue";
import VueRouter from "vue-router";
import Visitor from "../modules/visitor/Visitor.vue";
import Admin from "../modules/admin/routes";


Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "visitor",
    component: Visitor,
  },
  ...Admin

];

const router = new VueRouter({
  mode: "history",
  routes,
});


export default router;
