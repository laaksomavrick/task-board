<template>
    <div>
        Hello, world! {{ project.issues }}
    </div>
</template>

<script>
import { mapState, mapActions } from 'vuex'
export default {

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
            return state.selectedProject;
        }

    })

}
</script>

<style lang="scss" scoped>
</style>