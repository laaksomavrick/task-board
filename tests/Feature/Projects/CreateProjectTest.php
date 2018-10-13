<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateProjectTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function an_authorized_user_can_create_a_project()
    {
        $this->signIn();
        $project = $this->post("api/projects", [
            'name' => 'a name',
            'description' => 'a description',
            'colour' => 0
        ]);
        $project->assertStatus(201);
    }

    /**
     * @test
     */
    public function a_guest_cannot_create_a_project()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $project = $this->post("api/projects", [
            'name' => 'a name',
            'description' => 'a description',
            'colour' => 0
        ])->json();
    }

    /**
     * @test
     */
    public function a_project_can_only_be_created_in_the_users_team()
    {
        $this->signIn();
        $userDefaultTeamId = $this->user->team->id;
        $project = $this->post("api/projects", [
            'name' => 'a name',
            'description' => 'a description',
            'team_id' => 999,
            'colour' => 0
        ])->json();
        $this->assertTrue($project['team_id'] !== 999);
        $this->assertTrue($project['team_id'] === $userDefaultTeamId);
    }

    /**
     * @test
     */
    public function a_project_requires_a_name_and_description()
    {
        $this->signIn();
        $project = $this->post("api/projects", []);
        $project->assertStatus(302);
    }
}
