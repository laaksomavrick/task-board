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
    public function a_project_has_a_colour()
    {
        $this->assertTrue(isset($this->project->colour));
    }

    /**
     * @test
     */
    public function a_project_belongs_to_a_team()
    {
        $this->assertInstanceOf('App\Team', $this->project->team);
    }

    /**
     * @test
     */
    public function a_project_has_many_issues()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->project->issues);
    }

    /**
     * @test
     */
    public function a_project_has_many_categories()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->project->categories);
    }

    /**
     * @test
     */
    public function a_project_has_all_the_users_involved_in_its_issues()
    {
        $issues = create('App\Issue', ['project_id' => $this->project->id], 5);
        $users = $this->project->getUsersAttribute();
        // 5 assignees, 5 owners
        $this->assertEquals(10, count($users));
    }

}
