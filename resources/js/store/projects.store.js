import axios from "../http";

const state = {};

const actions = {
    createProject: async ({ commit }, payload) => {
        const response = await axios.post("projects", payload);
        const json = response.data;
        commit("addProject", json);
    }
};

const mutations = {};

const getters = {};

export default {
    state,
    actions,
    mutations,
    getters
};
