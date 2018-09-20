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
    public function a_team_has_many_projects()
    {
        $this->signIn();
        $team = $this->get("/teams/default")->json();
        $this->assertArrayHasKey('projects', $team);
    }

    /**
     * @test
     */
    public function a_guest_cannot_view_a_team()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $team = create('App\Team');
        $team = $this->get("teams/default")->json();
    }
}
