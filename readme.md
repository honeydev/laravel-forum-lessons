# Laravel Forum

## Конспект видео-уроков по созданию форума на фреймворке Laravel
Канал автора на [Youtube](https://www.youtube.com/channel/UCjUvIf50gEtUqxwewsZTgTw)

Урок на [Youtube](https://www.youtube.com/watch?v=UjtTHMODB00)

### Навигация по веткам:
* [Урок - 1](https://github.com/honeydev/laravel-forum-lessons/tree/lesson%231)
* [Урок - 2](https://github.com/honeydev/laravel-forum-lessons/tree/lesson%232)

### Команды из урока:
* Создать 50 тем 
```php
$threads = factory('App\Thread', 50)->create()
```
* Создать по 10 ответов к каждой теме
```php
$threads->each(function($thread) { factory('App\Reply', 10)->create(['thread_id' => $thread->id]); });
```
