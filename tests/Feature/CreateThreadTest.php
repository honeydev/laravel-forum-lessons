<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadTest extends TestCase
{
    use DatabaseMigrations;

    public function test_unauth_user_can_create_new_thread()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $user = factory('App\User')->create();
        $thread = factory('App\Thread')->create();
        $reply = factory('App\Thread')->make();
        $this->post('/threads', $reply->toArray());
        $this->get($thread->path())
            ->assertSee($thread->body);
    }

    public function test_unauth_user_can_not_see_create_thread()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $this->get('/threads/create')->asssertRedirect('/login');
    }

    public function test_user_can_create_new_thread()
    {
        $user = factory('App\User')->create();
        $this->be($user);
        $thread = factory('App\Thread')->create();
        $reply = factory('App\Thread')->make();
        $this->post('/threads', $reply->toArray());
        $this->get($thread->path())
            ->assertSee($thread->body);
    }
}
