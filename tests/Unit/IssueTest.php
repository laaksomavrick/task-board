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
    public function an_issue_has_an_owner()
    {
        $this->assertInstanceOf('App\User', $this->issue->owner);
    }

    /**
     * @test
     */
    public function an_issue_has_a_project()
    {
        $this->assertInstanceOf('App\Project', $this->issue->project);
    }
}
