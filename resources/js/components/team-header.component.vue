<template>
    <div class="w-screen h-24 bg-white">
        <div class="team-container container mx-auto p-4">
            <h1>
                {{ teamName }}
            </h1>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {

    computed: {
        teamName: function () {
            const team = this.getSelectedTeam;
            return team ? team.name : '';
        },
        ...mapGetters([
            'getSelectedTeam'
        ])
    }

}
</script>
<style lang="scss">
@import "~@/app.scss";
.team-container {
  max-width: $max-width;
}
</style>