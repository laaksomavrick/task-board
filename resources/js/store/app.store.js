import Vuex from 'vuex';
import Vue from 'vue';
import { startup } from './actions.store';
import team from './teams.store';
import user from './user.store';
import ui from './ui.store';
import project from './projects.store';
import issues from './issues.store';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        ...team.state,
        ...user.state,
        ...project.state
    },
    actions: {
        startup,
        ...team.actions,
        ...user.actions,
        ...project.actions,
        ...issues.actions
    },
    getters: {
        ...team.getters,
        ...user.getters,
        ...project.getters,
        ...issues.getters
    },
    mutations: {
        ...team.mutations,
        ...user.mutations,
        ...project.mutations,
        ...issues.mutations
    },
    modules: {
        ui
    }
});

export default store;
