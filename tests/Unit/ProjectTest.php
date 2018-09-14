<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProjectTest extends TestCase
{
    use DatabaseMigrations;

    protected $project;

    public function setUp()
    {
        parent::setUp();
        $this->project = create('App\Project');
    }

    /**
     * @test
     */
    public function a_project_has_a_name_and_description()
    {
        $this->assertTrue(isset($this->project->name));
        $this->assertTrue(isset($this->project->description));
    }

    /**
     * @test
     */
    public function a_project_belongs_to_a_team()
    {
        $this->assertInstanceOf('App\Team', $this->project->team);
    }
}
