import axios from "../http";

const state = {
    user: {}
};

const actions = {
    fetchUser: async ({ commit }) => {
        const response = await axios.get("/users/default");
        const json = response.data;
        commit("setUser", json);
    }
};

const mutations = {
    setUser(state, user) {
        state.user = user;
    }
};

const getters = {};

export default {
    state,
    actions,
    mutations,
    getters
};
