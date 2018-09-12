import ApiService from "../services/api.service";

// todo: builder class that generates CRUD actions for vuex
// needs to be extensible

const http = new ApiService("projects");

const state = {
    projects: []
};

const actions = {
    fetchProjects: async ({ commit }) => {
        const response = await http.index();
        const json = response.data;
        commit("setProjects", json);
    }
};

const mutations = {
    setProjects(state, projects) {
        state.projects = projects;
    }
};

const getters = {
    getProjects: state => state.projects
};

export default {
    state,
    actions,
    mutations,
    getters
};
