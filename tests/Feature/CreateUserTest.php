<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateUserTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function a_new_user_should_belong_to_a_team()
    {
        $user = create('App\User');
        $this->assertInstanceOf('App\Team', $user->team->first());
    }
}
