<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateIssueTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function an_authorized_user_can_create_an_issue()
    {
        $this->signIn();
        $project = create('App\Project', ['team_id' => $this->user->team->id]);
        $projectCategory = create('App\ProjectCategory', ['project_id' => $project->id]);
        $issue = $this->post("api/projects/{$project->id}/issues", [
            'name' => 'issue name',
            'projectId' => "{$project->id}",
            'projectCategoryId' => "{$projectCategory->id}"
        ]);
        $issue->assertStatus(201);
    }

    /**
     * @test
     */
    public function a_guest_cannot_create_an_issue()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $project = $this->post("api/projects/1/issues", [
            'name' => 'issue name',
            'projectId' => '1',
            'projectCategoryId' => '1'
        ])->json();
    }

    /**
     * @test
     */
    public function an_issue_can_only_be_created_in_the_users_team()
    {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');

        $this->signIn();
        $myProject = create('App\Project', ['team_id' => $this->user->team->id]);

        $notMyTeam = create('App\Team');
        $notMyProject = create('App\Project', ['team_id' => $notMyTeam->id]);
        $notMyProjectCategory = create('App\ProjectCategory', ['project_id' => $notMyProject->id]);

        $issue = $this->post("api/projects/{$notMyProject->id}/issues", [
            'name' => 'issue name',
            'projectId' => "{$notMyProject->id}",
            'projectCategoryId' => "{$notMyProjectCategory->id}"
        ])->json();
    }

    /**
     * @test
     */
    public function an_issue_requires_a_name_and_project_id_and_project_category_id()
    {
        $this->signIn();
        $project = create('App\Project', ['team_id' => $this->user->team->id]);
        $projectCategory = create('App\ProjectCategory', ['project_id' => $project->id]);
        $issue = $this->post("api/projects/{$project->id}/issues", []);
        $issue->assertStatus(302);
    }
}
