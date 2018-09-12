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

import axios from '../api';

export default {

    data: function () {
        return {
            projects: []
        }
    },

    mounted: async function () {
        const response = await axios.get('/projects')
        console.log(response.data)
        this.projects = { ...response.data }
    }

}
</script>