<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProjectTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function a_project_has_a_name_and_description()
    {
        $project = create('App\Project');
        $this->assertTrue(isset($project->name));
        $this->assertTrue(isset($project->description));
    }
}
