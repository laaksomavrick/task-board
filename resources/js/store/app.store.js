import Vuex from "vuex";
import Vue from "vue";
import { startup } from "./actions.store";
import projects from "./projects.store";

Vue.use(Vuex);

const store = new Vuex.Store({
    actions: {
        startup
    },
    modules: {
        projects
    }
});

export default store;
