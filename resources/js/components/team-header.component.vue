<template>
    <div class="w-screen h-auto bg-white shadow ">
        <div class="team-container container mx-auto p-4">
            <h1>
                {{ teamName }}
            </h1>
            <div class="team-details mt-4">
                <div class="team-issues">
                    <team-issue class="left-aligned" header="Backlog" :count="teamTodoCount"></team-issue>
                    <team-issue header="In Progress" :count="teamInProgressCount"></team-issue>
                    <team-issue header="Done" :count="teamDoneCount"></team-issue>
                </div>
                <div class="team-members">
                    <user-circle v-for="member in visibleTeamMembers" :key="member.user_id" :text="member.initials"></user-circle>
                    <user-circle v-if="excessMembers" :text="excessMembersCount"></user-circle>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex';
import TeamIssue from './team-issue.component';
import UserCircle from './user-circle.component';

export default {

    components: {
        TeamIssue,
        UserCircle
    },

    data: function () {
        return {
            visibleMembers: 4
        }
    },

    computed: mapState({
        teamName: function (state) {
            const team = state.teams.selectedTeam;
            return team ? team.name : '';
        },
        teamTodoCount: function (state) {
            const team = state.teams.selectedTeam;
            return team ? team.todo_issues_count : 0;
        },
        teamInProgressCount: function (state) {
            const team = state.teams.selectedTeam;
            return team ? team.in_progress_issues_count : 0;
        },
        teamDoneCount: function (state) {
            const team = state.teams.selectedTeam;
            return team ? team.done_issues_count : 0;
        },
        visibleTeamMembers: function (state) {
            const team = state.teams.selectedTeam;
            return team && team.users ? team.users.slice(0, this.visibleMembers) : [];
        },
        excessMembers: function (state) {
            return this.visibleTeamMembers.length > this.visibleMembers - 1;
        },
        excessMembersCount: function (state) {
            // todo: err when only 1 additional
            return `+${this.visibleTeamMembers.length - (this.visibleMembers - 1)}`;
        }
    })

}
</script>
<style lang="scss">
@import "~@/app.scss";
.team-container {
  max-width: $max-width;
  display: flex;
  flex-direction: column;
}
.team-details {
  display: flex;
}
.team-issues {
  display: flex;
}
.team-members {
  margin-left: auto;
  display: flex;
  align-items: center;
}
.left-aligned {
  margin-left: 0 !important;
  padding-left: 0 !important;
}
</style>