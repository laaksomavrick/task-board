import axios from "../http";

const state = {
    team: {}
};

const actions = {
    fetchTeam: async ({ commit }) => {
        const response = await axios.get("/api/teams/default");
        const json = response.data;
        commit("setTeam", json);
    }
};

const mutations = {
    setTeam(state, team) {
        state.team = team;
    },
    createProject(state, project) {
        state.team.projects = [...state.team.projects, project];
    },
    updateProject(state, project) {
        state.team.projects = state.team.projects.map(
            p => (p.id === project.id ? project : p)
        );
    },
    deleteProject(state, id) {
        state.team.projects = state.team.projects.filter(p => p.id !== id);
    }
};

const getters = {};

export default {
    state,
    actions,
    mutations,
    getters
};
