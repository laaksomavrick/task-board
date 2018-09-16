<template>
    <div class="w-screen h-auto bg-white">
        <div class="team-container container mx-auto p-4">
            <h1>
                {{ teamName }}
            </h1>
            <div class="team-issues mt-4">
                <team-issue class="left-aligned" header="Backlog" :count="teamTodoCount"></team-issue>
                <team-issue header="In Progress" :count="teamInProgressCount"></team-issue>
                <team-issue header="Done" :count="teamDoneCount"></team-issue>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex';
import TeamIssue from './team-issue.component';

export default {

    components: {
        TeamIssue
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
.team-issues {
  display: flex;
}
.left-aligned {
  margin-left: 0 !important;
  padding-left: 0 !important;
}
</style>