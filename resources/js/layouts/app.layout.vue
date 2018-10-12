<template>
    <div class="h-full flex flex-col">
        <navbar></navbar>
        <div class="router-container container mx-auto flex-1">
            <router-view />
        </div>
        <project-modal />
        <confirmation-modal />
    </div>
</template>

<script>
import { mapActions } from "vuex";
import Navbar from "../components/navbar.component";
import ProjectModal from "../components/modals/project-modal.component";
import ConfirmationModal from "../components/modals/confirmation-modal.component";

export default {
    components: {
        Navbar,
        ProjectModal,
        ConfirmationModal
    },

    mounted: async function() {
        await this.startup();
    },
    methods: {
        ...mapActions(["startup"])
    }
};
</script>

<style lang="scss">
@import "~@/app.scss";
body {
    background: $background;
    color: $text-color;
    height: 100vh;
    margin-left: 15px !important;
    margin-right: 15px !important;
    overflow-y: overlay;
}
#app {
    height: 100%;
}
.router-container {
    max-width: $max-width !important;
}
</style>
