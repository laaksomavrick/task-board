<template>
    <div class="container mx-auto px-4">
        <router-view />
    </div>
</template>

<script>
import { mapActions } from 'vuex'

export default {

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