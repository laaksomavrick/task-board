<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Issue;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UpdateIssueTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function an_authorized_user_can_update_an_issue()
    {
        $this->signIn();
        $project = create('App\Project', ['team_id' => $this->user->team->id]);
        $issue = create('App\Issue', ['project_id' => $project->id]);
        $response = $this->patch("api/projects/{$project->id}/issues/{$issue->id}", [
            'name' => 'hello, world!',
            'description' => null
        ]);
        $response->assertStatus(200);
        $updatedIssue = Issue::find($issue->id);
        $this->assertTrue($updatedIssue->name == 'hello, world!');
    }

    /**
     * @test
     */
    public function a_guest_cannot_update_an_issue()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $response = $this->patch("api/projects/1/issues/1", [
            'name' => 'issue name',
            'description' => 'asdasdasdasd',
        ])->json();
    }

    /**
     * @test
     */
    public function an_issue_can_only_be_updated_in_the_users_team()
    {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');

        $this->signIn();
        $myProject = create('App\Project', ['team_id' => $this->user->team->id]);

        $notMyTeam = create('App\Team');
        $notMyProject = create('App\Project', ['team_id' => $notMyTeam->id]);
        $notMyIssue = create('App\Issue', ['project_id' => $notMyProject->id]);

        $response = $this->patch("api/projects/{$notMyProject->id}/issues/{$notMyIssue->id}", [
            'name' => 'issue name',
            'description' => 'qweqweqwe'
        ])->json();
    }

    /**
     * @test
     */
    public function an_issue_requires_a_name_and_a_description()
    {
        $this->signIn();
        $project = create('App\Project', ['team_id' => $this->user->team->id]);
        $issue = create('App\Issue', ['project_id' => $project->id]);
        $response = $this->patch("api/projects/{$project->id}/issues/{$issue->id}", []);
        $response->assertStatus(302);
    }
}
