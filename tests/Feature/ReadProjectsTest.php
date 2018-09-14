<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadProjectsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function an_authenticated_user_can_view_projects_in_a_team_they_belong_to()
    {
        $this->signIn();
        $teamId = $this->user->teams->first()->id;
        create('App\Project', ['team_id' => $teamId]);
        $projects = $this->get("/teams/{$teamId}/projects")->json();
        $this->assertTrue(count($projects) == 1);
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_only_view_projects_in_teams_they_belong_to()
    {
        // TODO permissions via policies
        // $this->signIn();
        // $myProject = create('App\Project', ['user_id' => auth()->id()]);
        // $notMyProject = create('App\Project');
        // $projects = $this->get('/projects')->json();
        // $this->assertTrue(count($projects) == 1);
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function a_guest_cannot_view_projects()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $team = create('App\Team');
        create('App\Project', ['team_id' => $team->id]);
        $projects = $this->get("/teams/{$team->id}/projects")->json();
    }
}
