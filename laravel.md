# REST API server con Laravel

1. create project and start server (http://localhost:8000)

```
composer create-project laravel/laravel server
cd server
php artisan serve
```

2. create model and migration for posts

```
php artisan make:model Post -m
```

and add the following code to the app/Models/Post.php file

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content'];
}
```

3. edit migration file (add title and content fields) and run migration

```
php artisan migrate
```

4. create controller for posts and implement index, show, store, update and destroy methods

```
php artisan make:controller PostController --api
```

5. create routes/api.php and add routes for posts

```php
use App\Http\Controllers\PostController;
Route::apiResource('posts', PostController::class);
```

6. add api in bootstrap/app.php

```php
api: __DIR__.'/../routes/api.php',
``` 

7. seed the database with some posts (optional)

```
php artisan make:seeder PostSeeder
```

and edit PostSeeder.php to add some posts

```php
public function run(): void
{
    $posts = [
        ['title' => 'First Post', 'content' => 'This is the first post.'],
        ['title' => 'Second Post', 'content' => 'This is the second post.'],
        ['title' => 'Third Post', 'content' => 'This is the third post.'],
    ];

    foreach ($posts as $post) {
        \App\Models\Post::create($post);
    }
}
```

then run the seeder

```php 
php artisan db:seed --class=PostSeeder
```

8. test the API