<template>
    <router-view />
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