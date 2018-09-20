import axios from "../http";

const state = {
    team: {}
};

const actions = {
    fetchTeam: async ({ commit }) => {
        const response = await axios.get("/teams/default");
        const json = response.data;
        commit("setTeam", json);
    }
};

const mutations = {
    setTeam(state, team) {
        state.team = team;
    }
};

const getters = {};

export default {
    state,
    actions,
    mutations,
    getters
};
