<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class NotificationsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function a_user_can_view_their_notifications()
    {
        $this->signIn();
        $response = $this->get("api/notifications");
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function a_guest_cannot_view_a_notifications()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $response = $this->get("api/notifications")->json();
    }
}
