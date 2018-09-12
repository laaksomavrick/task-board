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
    public function an_authenticated_user_can_view_projects()
    {
        $this->signIn();
        create('App\Project', ['user_id' => auth()->id()]);
        $projects = $this->get('/api/projects')->json();
        $this->assertTrue(count($projects) == 1);
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_only_view_their_projects()
    {
        $this->signIn();
        $myProject = create('App\Project', ['user_id' => auth()->id()]);
        $notMyProject = create('App\Project');
        $projects = $this->get('/api/projects')->json();
        $this->assertTrue(count($projects) == 1);
    }

    /**
     * @test
     */
    public function a_guest_cannot_view_projects()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $projects = $this->get('/api/projects')->json();
    }
}
