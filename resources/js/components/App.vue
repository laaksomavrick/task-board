<template>
    <div>
        <h1>
            Hello, world!
        </h1>
        <div v-for="project in projects">
            {{ project.name }}
        </div>
    </div>
</template>

<script>

import axios from '../api';

export default {

    data: function () {
        return {
            projects: []
        }
    },

    mounted: async function () {
        const response = await axios.get('/api/projects')
        this.projects = { ...response.data }
    }

}
</script>