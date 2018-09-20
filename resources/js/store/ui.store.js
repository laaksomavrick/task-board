const state = {
    createProjectModalVisible: false
};

const actions = {
    toggleCreateProjectModal: ({ commit }) => {
        commit("toggleCreateProjectModal");
    }
};

const mutations = {
    toggleCreateProjectModal(state) {
        state.createProjectModalVisible = !state.createProjectModalVisible;
    }
};

const getters = {};

export default {
    state,
    actions,
    mutations,
    getters
};
