<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteProjectTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function an_authorized_user_can_delete_a_project_in_their_team()
    {
        $this->signIn();
        $project = create('App\Project', ['team_id' => $this->user->team->id]);
        $response = $this->delete("api/projects/{$project->id}");
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function a_guest_cannot_delete_a_project()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $project = $this->delete("api/projects/1")->json();
    }

    /**
     * @test
     */
    public function a_project_can_only_be_deleted_by_a_team_member()
    {
        $this->signIn();
        $anotherTeam = create('App\Team');
        $projectInAnotherTeam = create('App\Project', ['team_id' => $anotherTeam->id]);
        $response = $this->delete("api/projects/{$projectInAnotherTeam->id}");
        $response->assertStatus(403);
    }

}
