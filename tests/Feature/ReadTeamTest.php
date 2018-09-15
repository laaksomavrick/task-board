<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ReadTeamTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function a_team_has_many_issue_status_counts()
    {
        $this->signIn();
        $teamId = $this->user->teams->first()->id;
        $project = create('App\Project', ['team_id' => $teamId]);
        $todoIssues = create('App\Issue', ['project_id' => $project->id, 'status' => 'todo'], 3);
        $inProgressIssues = create('App\Issue', ['project_id' => $project->id, 'status' => 'inprogress'], 4);
        $doneIssues = create('App\Issue', ['project_id' => $project->id, 'status' => 'done'], 5);

        $team = $this->get("/teams")->json();
        $this->assertEquals(3, $team[0]['todo_issues_count']);
        $this->assertEquals(4, $team[0]['in_progress_issues_count']);
        $this->assertEquals(5, $team[0]['done_issues_count']);
    }
}
