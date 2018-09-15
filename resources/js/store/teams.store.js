import ApiService from "../services/api.service";

// todo: builder class that generates CRUD actions for vuex
// needs to be extensible

const http = new ApiService("teams");

const state = {
    teams: [],
    selectedTeam: {}
};

const actions = {
    fetchTeams: async ({ commit }) => {
        const response = await http.index();
        const json = response.data;
        commit("setTeams", json);
        commit("setSelectedTeam", json[0]); // todo
    }
};

const mutations = {
    setTeams(state, teams) {
        state.teams = teams;
    },
    setSelectedTeam(state, team) {
        state.selectedTeam = team;
    }
};

const getters = {
    getTeams: state => state.teams,
    getSelectedTeam: state => state.selectedTeam
};

export default {
    state,
    actions,
    mutations,
    getters
};