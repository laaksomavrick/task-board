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
        $this->assertTrue(false);
    }

    /**
     * @test
     */
    public function an_authenticated_user_can_only_view_their_projects()
    {
        $this->assertTrue(false);
    }

    /**
     * @test
     */

    public function a_guest_cannot_view_projects()
    {
        $this->assertTrue(false);
    }
}
