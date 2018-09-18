import ApiService from "../services/api.service";

// todo: builder class that generates CRUD actions for vuex
// needs to be extensible

const http = new ApiService("team");

const state = {
    activeTeam: {}
};

const actions = {
    fetchTeam: async ({ commit }) => {
        const response = await http.index();
        const json = response.data;
        commit("setTeam", json);
    }
};

const mutations = {
    setTeam(state, team) {
        state.activeTeam = team;
    }
};

const getters = {};

export default {
    state,
    actions,
    mutations,
    getters
};
