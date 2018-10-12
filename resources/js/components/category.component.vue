<template>
    <div class="category px-2">
        <h3 class="name">
            {{ category.name }}
        </h3>
        <div class="issues">
            <draggable class="draggable" v-model="issues" :options="{group: 'issue'}">
                <div v-for="issue in issues" :key="issue.id" class="py-2">
                    <issue :issue="issue" />
                </div>
            </draggable>
        </div>
    </div>
</template>

<script>
import Draggable from "vuedraggable";
import Issue from "./issue.component";

export default {
    props: ["category"],
    components: {
        Issue,
        Draggable
    },
    computed: {
        id() {
            return this.category ? this.category.id : null;
        },
        issues: {
            get() {
                return this.$store.getters.categoryIssues(this.id);
            },
            set(value) {
                const payload = { categoryId: this.id, issues: value };
                this.$store.dispatch("updateProjectCategoryIssues", payload);
            }
        }
    }
};
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
.issues {
    height: 100%;
}
.draggable {
    height: 100%;
}
</style>
