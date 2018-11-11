<template>
    <div class="kanban">
        <h1 class="m-2">{{ project.name }}</h1>
        <div class="categories pt-4">
            <template v-for="category in project.categories">
                <category :category="category" :key="category.id" />
            </template>
            <kanban-row>
                <!-- <dotted-plus class="create-category" scale="1" :clickHandler="toggleProjectCategoryModal" /> -->
                <h3 class="text-grey create-category" @click="toggleProjectCategoryModal">+ Add Column</h3>
            </kanban-row>
        </div>
    </div>
</template>

<script>
import { mapState, mapActions } from 'vuex';
import Category from '../components/category.component';
import KanbanRow from '../components/styles/kanban-row.component';
import DottedPlus from '../components/styles/dotted-plus.component';
export default {
    components: {
        Category,
        KanbanRow,
        DottedPlus
    },

    async mounted() {
        // todo loader
        await this.fetchSelectedProject(this.projectId);
    },

    beforeDestroy() {
        this.clearSelectedProject();
    },

    methods: {
        ...mapActions(['fetchSelectedProject', 'clearSelectedProject', 'toggleProjectCategoryModal'])
    },

    computed: mapState({
        projectId(state) {
            const params = state.route.params;
            return params.id;
        },
        project(state) {
            return state.selectedProject;
        }
    })
};
</script>

<style lang="scss" scoped>
.kanban {
    height: 100%;
    display: flex;
    flex-direction: column;
}
.categories {
    display: flex;
    flex-direction: row;
    overflow-x: auto;
    width: 100%;
    flex: 1;
}
.create-category {
    cursor: pointer;
    transition: color 100ms;

    &:hover {
        color: #606f7b;
    }
}
</style>
