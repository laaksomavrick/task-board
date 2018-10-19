import axios from "../http";

const state = {
    selectedProject: {}
};

const actions = {
    createProject: async ({ commit }, payload) => {
        const response = await axios.post("/api/projects", payload);
        const json = response.data;
        commit("createProject", json);
    },
    updateProject: async ({ commit }, payload) => {
        const response = await axios.patch(
            `api/projects/${payload.id}`,
            payload
        );
        const json = response.data;
        commit("updateProject", json);
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
        await axios.delete(`/api/projects/${id}`);
        commit("deleteProject", id);
    },
    addIssue: async ({ commit }, payload) => {
        const { projectId } = payload;
        const response = await axios.post(
            `/api/projects/${projectId}/issues`,
            payload
        );
        const json = response.data;
        commit("addIssue", json);
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
    },
    addIssue(state, issue) {
        const { project_category_id: categoryId } = issue;
        const category = state.selectedProject.categories.find(
            cat => cat.id === categoryId
        );
        const updatedCategory = {
            ...category,
            issues: [...category.issues, issue]
        };
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
