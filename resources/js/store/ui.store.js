const state = {
    confirmationModal: {
        visible: false,
        callback: null,
        message: null
    },
    projectModal: {
        visible: false,
        project: null
    },
    dropdown: null
};

const actions = {
    toggleConfirmationModal: ({ commit }, confirmationData) => {
        commit("toggleConfirmationModal", confirmationData);
    },
    toggleProjectModal: ({ commit }, projectData) => {
        commit("toggleProjectModal", projectData);
    },
    toggleDropdown: ({ commit }, id) => {
        commit("toggleDropdown", id);
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
    toggleProjectModal(state, projectData) {
        if (projectData) {
            state.projectModal.project = projectData.project;
        } else {
            state.projectModal.project = null;
        }

        state.projectModal.visible = !state.projectModal.visible;
    },
    toggleDropdown(state, id) {
        if (id) {
            state.dropdown = id;
        } else {
            state.dropdown = null;
        }
    }
};

const getters = {};

export default {
    state,
    actions,
    mutations,
    getters
};
