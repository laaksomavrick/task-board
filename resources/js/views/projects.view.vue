<template>
    <div>
        <h1>
            Hello, world!
        </h1>
        <div class="flex">
            <template v-for="project in projects">
                <card class="flex-1 px-2 py-2 m-2" :key="project.id">
                    {{ project.name }}
                </card>
            </template>
        </div>
    </div>
</template>

<script>

import { mapGetters } from 'vuex'
import Card from '../components/card.component';

export default {

    components: {
        Card
    },

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

<style lang="scss" scoped>
.projects {
  display: flex;
}
</style>