<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateProjectCategoryTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function an_authorized_user_can_create_a_project_category()
    {
        $this->signIn();
        $project = create('App\Project', ['team_id' => $this->user->team->id]);
        $projectCategory = $this->post("api/projects/{$project->id}/categories", [
            'name' => 'issue name',
            'projectId' => "{$project->id}",
        ]);
        $projectCategory->assertStatus(201);
    }

    /**
     * @test
     */
    public function a_guest_cannot_create_a_project_category()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $projectCategory = $this->post("api/projects/1/categories", [
            'name' => 'issue name',
            'projectId' => '1',
            'projectCategoryId' => '1'
        ])->json();
    }

    /**
     * @test
     */
    public function a_project_category_can_only_be_created_in_the_users_team()
    {
        $this->expectException('Illuminate\Auth\Access\AuthorizationException');

        $this->signIn();
        $myProject = create('App\Project', ['team_id' => $this->user->team->id]);

        $notMyTeam = create('App\Team');
        $notMyProject = create('App\Project', ['team_id' => $notMyTeam->id]);

        $projectCategory = $this->post("api/projects/{$notMyProject->id}/categories", [
            'name' => 'issue name',
            'projectId' => "{$notMyProject->id}",
        ])->json();
    }

    /**
     * @test
     */
    public function a_project_cateogry_requires_a_name_and_project_id()
    {
        $this->signIn();
        $project = create('App\Project', ['team_id' => $this->user->team->id]);
        $issue = $this->post("api/projects/{$project->id}/issues", []);
        $issue->assertStatus(302);
    }
}