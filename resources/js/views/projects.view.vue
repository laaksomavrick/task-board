<template>
    <div>
        <h1 class="m-2">Projects</h1>
        <div class="projects">
            <template v-for="project in projects">
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
                                <icon name="edit" :scale="1.25" @click.native="handleEditClick" />
                            </div>
                            <div class="project-option">
                                <icon name="trash-alt" :scale="1.25" @click.native="handleDeleteClick($event, project)" />
                            </div>
                        </div>
                    </div>
                </card>
            </template>
            <create-project />
        </div>
    </div>
</template>

<script>

import { mapState, mapActions } from 'vuex'
import Card from '../components/card.component';
import CreateProject from '../components/create-project.component';
import UserCircle from '../components/user-circle.component';
import Icon from 'vue-awesome/components/Icon'

export default {

    components: {
        Card,
        CreateProject,
        UserCircle,
        Icon
    },

    methods: {
        handleProjectClick (project) {
            const { id } = project;
            this.$router.push({ name: 'kanban', params: { id } });
        },
        handleEditClick (e) {
            e.stopPropagation();
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
            'deleteProject'
        ])
    },

    computed: mapState({
        projects: function (state) {
            const team = state.team;
            return team && team.projects ? team.projects : [];
        },
    })

}
</script>

<style lang="scss" scoped>
@import "~@/app.scss";
.projects {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-gap: 0.5rem;
  align-items: center;
}
@media only screen and (max-width: $md) {
  .projects {
    grid-template-columns: 1fr 1fr;
  }
}

@media only screen and (max-width: $sm) {
  .projects {
    grid-template-columns: 1fr;
  }
}
.project-card {
  display: flex;
  flex-direction: column;
  transition: border 100ms, border-color 100ms, transfom 100ms, box-shadow 100ms;
  cursor: pointer;
}
.project-card:hover {
  color: $brand-primary;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.12), 0 2px 4px 0 rgba(0, 0, 0, 0.08); // shadow-md
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