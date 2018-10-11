<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class IssueTest extends TestCase
{
    use DatabaseMigrations;

    protected $issue;

    public function setUp()
    {
        parent::setUp();
        $this->issue = create('App\Issue');
    }

    /**
     * @test
     */
    public function an_issue_belongs_to_an_owner()
    {
        $this->assertInstanceOf('App\User', $this->issue->owner);
    }

    /**
     * @test
     */
    public function an_issue_belongs_to_an_assignee()
    {
        $this->assertInstanceOf('App\User', $this->issue->assignee);
    }

    /**
     * @test
     */
    public function an_issue_belongs_to_a_project()
    {
        $this->assertInstanceOf('App\Project', $this->issue->project);
    }

    /**
     * @test
     */
    public function an_issue_belongs_to_a_project_category()
    {
        $this->assertInstanceOf('App\ProjectCategory', $this->issue->projectCategory);
    }

    /**
     * @test
     */
    public function an_issue_belongs_to_a_tag()
    {
        $this->assertInstanceOf('App\Tag', $this->issue->tag);
    }
}
