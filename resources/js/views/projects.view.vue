<template>
    <div>
        <h1>
            Hello, world!
        </h1>
        <div v-for="project in projects" :key="project.id">
            {{ project.name }}
        </div>
    </div>
</template>

<script>

import { mapGetters } from 'vuex'

export default {

    computed: {
        projects: function () {
            // todo users will have more than one team
            const team = this.getTeams;
            console.log(team)
            return team && team.projects ? team.projects : [];
        },
        ...mapGetters([
            'getTeams'
        ])
    }

}
</script>