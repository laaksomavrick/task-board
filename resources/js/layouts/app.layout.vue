<template>
    <div class="h-full flex flex-col w-full">
        <navbar></navbar>
        <div class="flex-1">
            <router-view />
        </div>
        <project-modal />
        <project-category-modal />
        <confirmation-modal />
        <issue-details-modal />
    </div>
</template>

<script>
import { mapActions } from 'vuex';
import Navbar from '../components/navbar.component';
import ProjectModal from '../components/modals/project-modal.component';
import ProjectCategoryModal from '../components/modals/project-category-modal.component';
import ConfirmationModal from '../components/modals/confirmation-modal.component';
import IssueDetailsModal from '../components/modals/issue-details-modal.component';

export default {
    components: {
        Navbar,
        ProjectModal,
        ProjectCategoryModal,
        ConfirmationModal,
        IssueDetailsModal
    },

    mounted: async function() {
        await this.startup();
    },
    methods: {
        ...mapActions(['startup'])
    }
};
</script>

<style lang="scss">
@import '~@/app.scss';
body {
    background: $background;
    color: $text-color;
    height: 100vh;
    overflow-y: overlay;
}
#app {
    height: 100%;
}
// .router-container {
//     max-width: $max-width !important;
// }
</style>
