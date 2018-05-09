<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateinForumTest extends TestCase
{
    use DatabaseMigrations;

    public function test_unauthuser_may_participate_in_forum_thread()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        //получаем юзера
        $thread = factory('App\Thread')->create();
        //создаем ответ и записываем в БД
        $reply = factory('App\Reply')->make();
        $this->post($thread->path() . '/replies', $reply->toArray());
    }

    public function test_user_may_participate_in_forum_thread()
    {
        //получаем юзера
        $user = factory('App\User')->create();
        $this->be($user);
        //создаем тему
        $thread = factory('App\Thread')->create();
        //создаем ответ и записываем в БД
        $reply = factory('App\Reply')->make();
        $this->post($thread->path() . '/replies', $reply->toArray());
        //проверяем вывод
        $this->get($thread->path())
            ->assertSee($reply->body);
    }
}
