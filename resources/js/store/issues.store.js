import axios from '../http';

const state = undefined;

const actions = {
    updateIssue: async ({ commit }, payload) => {
        const response = await axios.patch(`/api/projects/${payload.project_id}/issues/${payload.id}`, payload);
        const json = response.data;
        commit('updateIssue', json);
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
        state.team.projects = state.team.projects.map(p => (p.id === project.id ? project : p));
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
