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
            return this.getProjects
        },
        ...mapGetters([
            'getProjects'
        ])
    }

}
</script>