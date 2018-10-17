<template>
    <div class="category px-2">
        <div class="category-header">
            <h3 class="category-name">
                {{ category.name }}
            </h3>
            <div class="category-options" @click="handleDropdownClick">
                <icon class="" name="ellipsis-v" :scale="1" />
                <dropdown :items="dropdownItems" :close="closeDropdown" ref="dropdown" />
            </div>
        </div>
        <div class="issues">
            <add-issue v-if="addIssue" />
            <draggable class="draggable" v-model="issues" :options="{group: 'issue'}">
                <div v-for="issue in issues" :key="issue.id" class="py-2">
                    <issue :issue="issue" />
                </div>
            </draggable>
        </div>
    </div>
</template>

<script>
import Icon from "vue-awesome/components/Icon";
import Draggable from "vuedraggable";
import Issue from "./issue.component";
import Dropdown from "./dropdown.component";
import DropdownMixin from "../mixins/dropdown.mixin";
import AddIssue from "./add-issue.component";

export default {
    props: ["category"],
    components: {
        Issue,
        Draggable,
        Dropdown,
        Icon,
        AddIssue
    },
    mixins: [DropdownMixin],
    data() {
        return {
            dropdownItems: [
                { text: "Add new issue", callback: this.showAddIssue }
            ],
            addIssue: true
        };
    },
    methods: {
        showAddIssue() {
            this.addIssue = true;
            this.closeDropdown();
        }
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
.category-header {
    display: flex;
}
.category-name {
    flex: 1;
}
.category-options {
    margin-left: auto;
    width: 25px;
    height: 25px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}
.issues {
    height: 100%;
}
</style>
