import Vuex from "vuex";
import Vue from "vue";
import { startup } from "./actions.store";
import team from "./teams.store";

Vue.use(Vuex);

const store = new Vuex.Store({
    actions: {
        startup
    },
    modules: {
        team
    }
});

export default store;
