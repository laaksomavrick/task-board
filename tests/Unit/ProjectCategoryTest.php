<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProjectCategoryTest extends TestCase
{
    use DatabaseMigrations;

    protected $projectCategory;

    public function setUp()
    {
        parent::setUp();
        $this->projectCategory = create('App\ProjectCategory');
    }

    /**
     * @test
     */
    public function a_project_category_has_a_name()
    {
        $this->assertTrue(isset($this->projectCategory->name));
    }

    /**
     * @test
     */
    public function a_project_belongs_to_a_project()
    {
        $this->assertInstanceOf('App\Project', $this->projectCategory->project);
    }

    /**
     * @test
     */
    public function a_project_category_has_many_issues()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->projectCategory->issues);
    }

}
