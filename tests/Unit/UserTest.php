<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->user = create('App\User');
    }

    /**
     * @test
     */
    public function a_user_has_a_name_email_and_password()
    {
        $this->assertTrue(isset($this->user->name));
        $this->assertTrue(isset($this->user->email));
        $this->assertTrue(isset($this->user->password));
    }

    /**
     * @test
     */
    public function a_user_has_many_teams()
    {
        $this->user->teams()->attach(create('App\Team', [], 3));
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->user->teams);
    }

}
