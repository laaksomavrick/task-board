<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TeamTest extends TestCase
{
    use DatabaseMigrations;

    protected $team;

    public function setUp()
    {
        parent::setUp();
        $this->team = create('App\Team');
    }

    /**
     * @test
     */
    public function a_team_has_a_name()
    {
        $this->assertTrue(isset($this->team->name));
    }

    /**
     * @test
     */
    public function a_team_has_many_users()
    {
        create('App\User', ['team_id' => $this->team->id], 3);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->team->users);
    }

    /**
     * @test
     */
    public function a_team_has_many_tags()
    {
        create('App\Tag', ['team_id' => $this->team->id], 3);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->team->tags);
    }

    /**
     * @test
     */
    public function a_team_has_many_projects()
    {
        create('App\Project', ['team_id' => $this->team->id], 3);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->team->projects);
    }

}
