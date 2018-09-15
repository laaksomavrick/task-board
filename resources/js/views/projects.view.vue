<template>
    <div>

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
            const team = this.getSelectedTeam;
            return team && team.projects ? team.projects : [];
        },
        ...mapGetters([
            'getSelectedTeam'
        ])
    }

}
</script>

<style lang="scss" scoped>
.projects {
  display: flex;
}
</style>