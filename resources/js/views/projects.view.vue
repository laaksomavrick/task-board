<template>
    <div>
        <h1 class="m-2">Projects</h1>
        <div class="projects">
            <template v-for="project in projects">
                <project-card :project="project" :key="project.id" />
            </template>
            <create-project />
        </div>
    </div>
</template>

<script>
import Card from '../components/card.component';
import CreateProject from '../components/create-project.component';
import ProjectCard from '../components/project-card.component';
import UserCircle from '../components/user-circle.component';
import Icon from 'vue-awesome/components/Icon';
import { mapState, mapActions } from 'vuex';

export default {
    components: {
        CreateProject,
        Icon,
        ProjectCard
    },
    computed: mapState({
        projects (state) {
            const team = state.team;
            return team && team.projects ? team.projects : [];
        },
    })
}
</script>

<style lang="scss" scoped>
@import "~@/app.scss";
.projects {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-gap: 0.5rem;
  align-items: center;
}
@media only screen and (max-width: $md) {
  .projects {
    grid-template-columns: 1fr 1fr;
  }
}

@media only screen and (max-width: $sm) {
  .projects {
    grid-template-columns: 1fr;
  }
}
</style>