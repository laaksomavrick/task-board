import Vuex from "vuex";
import Vue from "vue";
import { startup } from "./actions.store";
import projects from "./projects.store";
import teams from "./teams.store";

Vue.use(Vuex);

const store = new Vuex.Store({
    actions: {
        startup
    },
    modules: {
        projects,
        teams
    }
});

export default store;
