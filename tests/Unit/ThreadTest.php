<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
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
    
    public function test_a_thread_has_a_creator()
    {
        $thread = factory('App\Thread')->create();
        $this->assertInstanceOf('App\User', $thread->creator);
    }

    public function test_a_thread_can_add_reply()
    {
        $this->thread->addReply([
            'body' => 'chebureck',
            'user_id' => 1
        ]);

        $this->assertCount(1, $this->thread->replies);
    }
}
