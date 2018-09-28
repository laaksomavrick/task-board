<template>
    <div class="category px-2">
        <h3 class="name">
            {{ category.name }}
        </h3>
        <div class="issues">
            <div v-for="issue in category.issues" :key="issue.id" class="py-2">
                <issue :issue="issue" />
            </div>
        </div>
    </div>
</template>

<script>

import Issue from './issue.component';

export default {

    props: [
        'category'
    ],
    components: {
        Issue
    }

}

</script>

<style lang="scss" scoped>
.category {
  height: 100%;
  display: flex;
  flex: 0 0 300px;
  flex-direction: column;
  max-width: 300px;
  width: 300px;
}
</style>
