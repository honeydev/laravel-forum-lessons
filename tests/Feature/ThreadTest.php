<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    public function SetUp()
    {
        parent::SetUp();
        $this->thread = factory('App\Thread')->create();
    }

    public function test_a_user_can_browse_thread()
    {
        $this->get('/threads')
            ->assertSee($this->thread->title);
    }

    public function test_a_user_can_browse_single_thread()
    {
        $this->get($this->thread->path())
            ->assertSee($this->thread->body);
    }

    public function test_a_user_can_browse_replies()
    {
        $reply = factory('App\Reply')->create(['thread_id' => $this->thread->id]);
        $this->get($this->thread->path())
            ->assertSee($reply->body);
    }
}
