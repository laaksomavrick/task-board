<template>
    <card class="project-card p-4 w-auto h-48" :key="project.id" @click.native="handleProjectClick(project)" :class="backgroundColour">
        <div class="project-inner">
            <div class="project-details">
                <div class="project-title text-2xl font-semibold">
                    {{ project.name }}
                </div>
                <!-- <div class="project-member-circles">
                    <user-circle v-for="user in project.users" :key="user.user_id" :user="user"></user-circle>
                </div> -->
            </div>
            <div class="project-options">
                <div class="project-option" @click="handleDropdownClick">
                    <icon name="ellipsis-v" :scale="1.25" />
                </div>
                <dropdown :items="dropdownItems" :close="closeDropdown" ref="dropdown" />
            </div>
        </div>
    </card>
</template>

<script>
import { mapActions } from "vuex";
import Icon from "vue-awesome/components/Icon";
import Card from "../components/card.component";
import UserCircle from "../components/user-circle.component";
import Dropdown from "../components/dropdown.component";
import { getClassForColour } from "../utils/colourable.utils";
import DropdownMixin from "../mixins/dropdown.mixin";

export default {
    props: ["project"],
    components: {
        Card,
        UserCircle,
        Icon,
        Dropdown
    },
    mixins: [DropdownMixin],
    data() {
        return {
            dropdownItems: [
                { text: "Edit", callback: this.handleEditClick },
                { text: "Delete", callback: this.handleDeleteClick }
            ]
        };
    },
    methods: {
        handleProjectClick(project) {
            const { id } = project;
            this.$router.push({ name: "kanban", params: { id } });
        },
        handleEditClick() {
            const projectData = {
                project: this.project
            };
            this.closeDropdown();
            this.toggleProjectModal(projectData);
        },
        handleDeleteClick(e) {
            const confirmationData = {
                message: `Are you sure you want to delete ${
                    this.project.name
                }?`,
                callback: async () => {
                    await this.deleteProject(this.project.id);
                }
            };
            this.closeDropdown();
            this.toggleConfirmationModal(confirmationData);
        },
        ...mapActions([
            "toggleConfirmationModal",
            "toggleProjectModal",
            "deleteProject"
        ])
    },
    computed: {
        backgroundColour() {
            return getClassForColour(this.project.colour);
        }
    }
};
</script>

<style lang="scss" scoped>
@import "~@/app.scss";
.project-card {
    display: flex;
    flex-direction: column;
    transition: border 100ms, border-color 100ms, transform 100ms,
        box-shadow 100ms, color 100ms;
    cursor: pointer;
    color: white;
    margin: 2px;
}
.project-card:hover {
    // transform: translateY(-2px);
    // box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.12), 0 2px 4px 0 rgba(0, 0, 0, 0.08); // shadow-md

    & .project-inner .project-option {
        color: white;
        pointer-events: initial;
    }
}
.project-inner {
    flex: 1;
    display: flex;
    flex-direction: row;
}
.project-details {
    display: flex;
    flex-direction: column;
}
.project-title {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    flex: 1;
}
.project-member-circles {
    display: flex;
}
.project-options {
    margin-left: auto;
    display: flex;
    flex-direction: column;
}
.project-option {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 35px;
    height: 35px;
    margin-bottom: 0.5rem;
    color: transparent;
    transition: color 100ms;
    cursor: pointer;
    // pointer-events: none;
}
</style>
