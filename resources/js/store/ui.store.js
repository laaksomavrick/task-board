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
    projectCategoryModal: {
        visible: false,
        projectCategory: null
    },
    issueDetailsModal: {
        visible: false,
        issue: null
    }
};

const actions = {
    toggleConfirmationModal: ({ commit }, confirmationData) => {
        commit('toggleConfirmationModal', confirmationData);
    },
    toggleProjectModal: ({ commit }, projectData) => {
        commit('toggleProjectModal', projectData);
    },
    toggleProjectCategoryModal: ({ commit }, projectCategoryData) => {
        commit('toggleProjectCategoryModal', projectCategoryData);
    },
    toggleIssueDetailsModal: ({ commit }, issueData) => {
        commit('toggleIssueDetailsModal', issueData);
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
    toggleProjectCategoryModal(state, projectCategoryData) {
        if (projectCategoryData) {
            state.projectCategoryModal.projectCategory = projectCategoryData.projectCategory;
        } else {
            state.projectCategoryModal.projectCategory = null;
        }

        state.projectCategoryModal.visible = !state.projectCategoryModal.visible;
    },
    toggleIssueDetailsModal(state, issueData) {
        if (issueData) {
            state.issueDetailsModal.issue = issueData.issue;
        } else {
            state.issueDetailsModal.issue = null;
        }

        state.issueDetailsModal.visible = !state.issueDetailsModal.visible;
    }
};

const getters = {};

export default {
    state,
    actions,
    mutations,
    getters
};
