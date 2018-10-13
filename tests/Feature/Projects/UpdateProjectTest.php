<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UpdateProjectTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function an_authorized_user_can_update_a_project_in_their_team()
    {
        $this->signIn();
        $project = create('App\Project', ['team_id' => $this->user->team->id, 'name' => 'a name']);
        $response = $this->patch("api/projects/{$project->id}", [
            'name' => 'another name',
            'description' => 'another description',
            'colour' => 0
        ]);
        $this->assertEquals($response->json()['name'], 'another name');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function a_guest_cannot_update_a_project()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $project = $this->patch("api/projects/1", [
            'name' => 'a name',
            'description' => 'a description'
        ])->json();
    }

    /**
     * @test
     */
    public function a_project_can_only_be_updated_by_a_team_member()
    {
        $this->signIn();
        $anotherTeam = create('App\Team');
        $projectInAnotherTeam = create('App\Project', ['team_id' => $anotherTeam->id]);
        $response = $this->patch("api/projects/{$projectInAnotherTeam->id}", ['name' => 'qeqwewqe']);
        $response->assertStatus(403);
    }

}
