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
        $user = create('App\User');
        $thread = make('App\Thread');
        $this->post('/threads', $thread->toArray());
    }

    public function test_unauth_user_can_not_see_create_thread()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $this->get('/threads/create')->asssertRedirect('/login');
    }

    public function test_user_can_create_new_thread()
    {
        $user = create('App\User');
        $this->be($user);
        $this->signIn();
        $thread = create('App\Thread');
        $this->post('/threads', $thread->toArray());
        $this->get($thread->path())
            ->assertSee($thread->body);
    }
}
