<template>
    <card class="project-card p-4 m-2 w-auto h-48" :key="project.id" @click.native="handleProjectClick(project)">
        <div class="project-details">
            <div class="project-title text-2xl font-semibold">
                {{ project.name }}
            </div>
        </div>
        <div class="project-bottom">
            <div class="project-member-circles">
                <user-circle v-for="member in project.users" :key="member.user_id" :text="member.initials"></user-circle>
            </div>
            <div class="project-options">
                <div class="project-option">
                    <icon name="edit" :scale="1.25" @click.native="handleEditClick($event, project)" />
                </div>
                <div class="project-option">
                    <icon name="trash-alt" :scale="1.25" @click.native="handleDeleteClick($event, project)" />
                </div>
            </div>
        </div>
    </card>
</template>

<script>
import { mapActions } from 'vuex';
import Card from '../components/card.component';
import UserCircle from '../components/user-circle.component';
import Icon from 'vue-awesome/components/Icon';

export default {
    props: [
        'project'
    ],
    components: {
        Card,
        UserCircle,
        Icon
    },
    methods: {
        handleProjectClick (project) {
            const { id } = project;
            this.$router.push({ name: 'kanban', params: { id } });
        },
        handleEditClick (e, project) {
            e.stopPropagation();
            const projectData = {
                project
            }
            this.toggleProjectModal(projectData);
        },
        handleDeleteClick (e, project) {
            e.stopPropagation();
            const confirmationData = {
                message: `Are you sure you want to delete ${project.name}?`,
                callback: async () => {
                    await this.deleteProject(project.id)
                }
            }
            this.toggleConfirmationModal(confirmationData);
        },
        ...mapActions([
            'toggleConfirmationModal',
            'toggleProjectModal',
            'deleteProject'
        ])
    },
}
</script>

<style lang="scss" scoped>
@import "~@/app.scss";
.project-card {
  display: flex;
  flex-direction: column;
  transition: border 100ms, border-color 100ms, transform 100ms,
    box-shadow 100ms, color 100ms;
  cursor: pointer;
}
.project-card:hover {
  color: $brand-primary;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.12), 0 2px 4px 0 rgba(0, 0, 0, 0.08); // shadow-md

  & .project-bottom .project-options {
    color: $brand-primary;
    pointer-events: initial;
  }
}
.project-details {
  flex: 1;
}
.project-title {
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
}
.project-bottom {
  display: flex;
  align-items: center;
}
.project-options {
  margin-left: auto;
  display: flex;
  flex-direction: row;
  color: white;
  pointer-events: none;
  transition: color 100ms;
}
.project-option {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 25px;
  height: 25px;
}
.project-member-circles {
  display: flex;
  align-items: center;
  margin-top: auto;
}
</style>