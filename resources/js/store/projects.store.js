import axios from "../http";

const state = {
    selectedProject: {}
};

const actions = {
    createProject: async ({ commit }, payload) => {
        const response = await axios.post("/api/projects", payload);
        const json = response.data;
        commit("addProject", json);
    },
    fetchSelectedProject: async ({ commit }, id) => {
        console.log("here");
        const response = await axios.get(`/api/projects/${id}`);
        const json = response.data;
        console.log(json);
        commit("setSelectedProject", json);
    },
    clearSelectedProject: ({ commit }) => {
        commit("setSelectedProject", {});
    }
};

const mutations = {
    setSelectedProject(state, project) {
        state.selectedProject = project;
    }
};

const getters = {};

export default {
    state,
    actions,
    mutations,
    getters
};
