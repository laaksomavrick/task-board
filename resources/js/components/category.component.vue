<template>
    <kanban-row>
        <div class="category-header">
            <h3 class="category-name">
                {{ category.name }}
            </h3>
            <div class="category-options" @click="handleDropdownClick">
                <icon class="category-option" name="ellipsis-v" :scale="1" />
                <div>
                    <dropdown :items="dropdownItems" :close="closeDropdown" ref="dropdown" />
                </div>
            </div>
        </div>
        <div class="issues">
            <add-issue v-if="addIssue" :category="category" :onCancel="hideAddIssue" />
            <draggable class="draggable" v-model="issues" :options="{group: 'issue'}">
                <div v-for="issue in issues" :key="issue.id" class="py-2">
                    <issue :issue="issue" />
                </div>
            </draggable>
        </div>
    </kanban-row>
</template>

<script>
import Icon from "vue-awesome/components/Icon";
import Draggable from "vuedraggable";
import Issue from "./issue.component";
import Dropdown from "./dropdown.component";
import DropdownMixin from "../mixins/dropdown.mixin";
import AddIssue from "./add-issue.component";
import KanbanRow from "./styles/kanban-row.component";

export default {
    props: ["category"],
    components: {
        Issue,
        Draggable,
        Dropdown,
        Icon,
        AddIssue,
        KanbanRow
    },
    mixins: [DropdownMixin],
    data() {
        return {
            dropdownItems: [
                { text: "Add new issue", callback: this.showAddIssue }
            ],
            addIssue: false
        };
    },
    methods: {
        showAddIssue() {
            this.addIssue = true;
            this.closeDropdown();
        },
        hideAddIssue() {
            this.addIssue = false;
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
.category-header:hover {
    & .category-options .category-option {
        color: inherit;
    }
}
.category-option {
    color: transparent;
    transition: color 100ms;
}
.issues {
    height: 100%;
}
.draggable {
    min-height: 100px;
}
</style>
