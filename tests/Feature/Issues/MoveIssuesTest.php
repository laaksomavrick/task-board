<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MoveIssuesTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function an_authorized_user_can_move_an_issue_to_another_category()
    {
        $this->signIn();

        $project = create('App\Project');

        $categoryWithIssues = create('App\ProjectCategory', ['project_id' => $project->id]);
        $categoryWithoutIssues = create('App\ProjectCategory', ['project_id' => $project->id]);

        $issues = create(
            'App\Issue',
            ['project_id' => $project->id, 'project_category_id' => $categoryWithIssues->id],
            3
        );

        $ids = $issues->map(function ($issue) {
            return $issue->id;
        });

        $response = $this->patch("api/categories/{$categoryWithoutIssues->id}/issues/move", [
            'ids' => $ids,
        ]);
        $response->assertStatus(200);
        $this->assertTrue(count($categoryWithoutIssues->issues) === 3);
        $this->assertTrue(count($categoryWithIssues->issues) === 0);
    }
}
