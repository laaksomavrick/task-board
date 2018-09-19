import Vuex from "vuex";
import Vue from "vue";
import { startup } from "./actions.store";
import team from "./teams.store";
import user from "./user.store";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        ...team.state,
        ...user.state
    },
    actions: {
        startup,
        ...team.actions,
        ...user.actions
    },
    getters: {
        ...team.getters,
        ...user.getters
    },
    mutations: {
        ...team.mutations,
        ...user.mutations
    }
});

export default store;
