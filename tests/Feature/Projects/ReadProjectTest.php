<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadProjectTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function an_authorized_user_can_see_a_project()
    {
        $this->signIn();
        create('App\Project');
        $project = $this->get("api/projects/1");
        $project->assertStatus(200);
    }

    /**
     * @test
     */
    public function a_project_has_categories_with_issues()
    {
        // todo: this test tests too much
        $this->signIn();
        $project = create('App\Project');
        $category = create('App\ProjectCategory', ['project_id' => $project->id]);
        $issue = create('App\Issue', ['project_category_id' => $category->id]);
        $project = $this->get("api/projects/1")->json();
        $this->assertArrayHasKey('categories', $project);
        $this->assertArrayHasKey('issues', $project['categories'][0]);
        $this->assertArrayHasKey('tag', $project['categories'][0]['issues'][0]);
    }

    /**
     * @test
     */
    public function a_guest_cannot_see_a_project()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $team = create('App\Team');
        $team = $this->get("api/projects/1")->json();
    }
}
