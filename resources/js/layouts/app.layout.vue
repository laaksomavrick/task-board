<template>
    <div>
        <team-header></team-header>
        <div class="container mx-auto px-4">
            <router-view />
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex'
import TeamHeader from '../components/team-header.component';

export default {

    components: {
        TeamHeader
    },

    mounted: async function () {
        await this.startup()
    },
    methods: {
        ...mapActions([
            'startup'
        ])
    }

}
</script>

<style lang="scss">
@import "~@/app.scss";
body {
  background: $background;
  color: $text-color;
}
</style>