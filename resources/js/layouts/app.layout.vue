<template>
    <div class="h-full flex flex-col">
        <navbar></navbar>
        <div class="router-container container mx-auto py-4 flex-1">
            <router-view />
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex'
import Navbar from '../components/navbar.component';

export default {

    components: {
        Navbar
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
  height: 100vh;
}
#app {
  height: 100%;
}
.router-container {
  max-width: $max-width !important;
}
</style>