# Laravel Forum


## Конспект видео-уроков по созданию форума на фреймворке Laravel
Канал автора на [Youtube](https://www.youtube.com/channel/UCjUvIf50gEtUqxwewsZTgTw)

Урок на [Youtube](https://www.youtube.com/watch?v=rs7YYgU8Ldk)

### Навигация по веткам:
* [Урок - 1](https://github.com/honeydev/laravel-forum-lessons/tree/lesson%231)
* [Урок - 2](https://github.com/honeydev/laravel-forum-lessons/tree/lesson%232)
* [Урок - 3](https://github.com/honeydev/laravel-forum-lessons/tree/lesson%233)
* [Урок - 4](https://github.com/honeydev/laravel-forum-lessons/tree/lesson%23[)
    
## Команды урока
генерирует class map для автозагрузчика composer
```bash
$ composer dump-autoload 
```

Создаем 50 тем:
```php
$ php artisan tinker
$ factory('App\Thread', 50)->create();
```
