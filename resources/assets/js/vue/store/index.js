import Vuex from "vuex";
import Vue from "vue";
import admin from "../modules/admin/vuex/index";


Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    admin: admin.state
  },
  mutations: {
    //Loop through modules and reset each
    reset(state) {
      Object.keys(state).forEach((key) => {
        Object.assign(state[key], null);
      });
    },
  },
  actions: {},
  modules: {
    admin,
  },
  // plugins: [authState],
});
