<template>
    <card class="issue p-4">
        {{ issue.name }}
    </card>
</template>

<script>
import Card from './card.component';
export default {
    props: [
        'issue'
    ],
    components: {
        Card
    }
}
</script>

<style lang="scss" scoped>
.issue {
  cursor: pointer;
}
</style>