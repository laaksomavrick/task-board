<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $user;

    protected function signIn($user = null)
    {
        $user = $user ? : create('App\User');
        $this->user = $user;
        $this->actingAs($user);
        return $this;
    }
}
