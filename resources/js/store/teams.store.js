import ApiService from "../services/api.service";

// todo: builder class that generates CRUD actions for vuex
// needs to be extensible

const http = new ApiService("teams");

const state = {
    teams: []
};

const actions = {
    fetchTeams: async ({ commit }) => {
        const response = await http.index();
        const json = response.data;
        commit("setTeams", json);
    }
};

const mutations = {
    setTeams(state, teams) {
        state.teams = teams;
    }
};

const getters = {
    getTeams: state => state.teams
};

export default {
    state,
    actions,
    mutations,
    getters
};
