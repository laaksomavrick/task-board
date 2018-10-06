const state = {
    confirmationModal: {
        visible: false,
        callback: null,
        message: null
    },
    createProjectModalVisible: false
};

const actions = {
    toggleConfirmationModal: ({ commit }, confirmationData) => {
        commit("toggleConfirmationModal", confirmationData);
    },
    toggleCreateProjectModal: ({ commit }) => {
        commit("toggleCreateProjectModal");
    }
};

const mutations = {
    toggleConfirmationModal(state, confirmationData) {
        if (confirmationData) {
            state.confirmationModal.callback = confirmationData.callback;
            state.confirmationModal.message = confirmationData.message;
        } else {
            state.confirmationModal.callback = null;
            state.confirmationModal.message = null;
        }

        state.confirmationModal.visible = !state.confirmationModal.visible;
    },
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
