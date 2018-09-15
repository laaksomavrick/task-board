<template>
    <div class="projects">
        <template v-for="project in projects">
            <card class="project-card p-4 m-2 w-auto h-48" :key="project.id">
                <div class="title text-2xl font-semibold">{{ project.name }}</div>
            </card>
        </template>
    </div>
</template>

<script>

import { mapState } from 'vuex'
import Card from '../components/card.component';

export default {

    components: {
        Card
    },

    computed: mapState({
        projects: function (state) {
            const team = state.teams.selectedTeam;
            return team && team.projects ? team.projects : [];
        },
    })

}
</script>

<style lang="scss" scoped>
.projects {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-gap: 1.5rem;
}
.project-card {
  min-width: 150px;
  flex: 1;
  display: flex;
  flex-direction: column;
}
.title {
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
}
</style>