<template>
    <div class="kanban">
        <h1>{{ project.name }}</h1>
        <div class="categories pt-4">
            <template v-for="category in project.categories">
                <category :category="category" :key="category.id" />
            </template>
        </div>
    </div>
</template>

<script>
import { mapState, mapActions } from 'vuex'
import Category from '../components/category.component';
export default {

    components: {
        Category
    },

    async mounted () {
        // todo loader
        await this.fetchSelectedProject(this.projectId)
    },

    beforeDestroy () {
        this.clearSelectedProject();
    },

    methods: {
        ...mapActions([
            'fetchSelectedProject',
            'clearSelectedProject'
        ])
    },

    computed: mapState({
        projectId (state) {
            const params = state.route.params;
            return params.id;
        },
        project (state) {
            console.log(state.selectedProject);
            return state.selectedProject;
        }

    })

}
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
</style>