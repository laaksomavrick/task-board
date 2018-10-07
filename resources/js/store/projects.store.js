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
        const response = await axios.get(`/api/projects/${id}`);
        const json = response.data;
        commit("setSelectedProject", json);
    },
    clearSelectedProject: ({ commit }) => {
        commit("setSelectedProject", {});
    },
    updateProjectCategoryIssues: async ({ commit }, payload) => {
        commit("setSelectedProjectCategoryIssues", payload);
        const data = { ids: payload.issues.map(i => i.id) };
        await axios.patch(
            `/api/categories/${payload.categoryId}/issues/move`,
            data
        );
    },
    deleteProject: async ({ commit }, id) => {
        const response = await axios.delete(`/api/projects/${id}`);
        commit("removeProject", id);
    }
};

const mutations = {
    setSelectedProject(state, project) {
        state.selectedProject = project;
    },
    setSelectedProjectCategoryIssues(state, params) {
        const { categoryId, issues } = params;
        const category = state.selectedProject.categories.find(
            cat => cat.id === categoryId
        );
        const updatedCategory = { ...category, issues };
        const updatedCategories = state.selectedProject.categories.map(cat => {
            return cat.id === categoryId ? updatedCategory : cat;
        });
        const updatedSelectedProject = {
            ...state.selectedProject,
            categories: updatedCategories
        };
        state.selectedProject = updatedSelectedProject;
    }
};

const getters = {
    categoryIssues: state => categoryId => {
        return state.selectedProject.categories.find(
            cat => cat.id === categoryId
        ).issues;
    }
};

export default {
    state,
    actions,
    mutations,
    getters
};
