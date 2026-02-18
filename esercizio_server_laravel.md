# REST API server con Laravel
[Torna al README iniziale](README.md)

## Requisiti
- `PHP`: linguaggio di programmazione necessario per eseguire Laravel
    Se non è installato, puoi installarlo con:
    ```bash
    sudo apt install php
    ```
- `Composer`: strumento per la gestione delle dipendenze in PHP
    Se non è installato, puoi installarlo con:
    ```bash
    sudo apt install composer
    ```
- `Laravel`: framework PHP per lo sviluppo di applicazioni web
    Se non è installato, puoi installarlo globalmente con:
    ```bash
    composer global require laravel/installer
    ```

## Istruzioni

1. Creazione del progetto Laravel e avvio del server (http://localhost:8000)

    ```bash
    composer create-project laravel/laravel server
    ```
    Spostarsi nella cartella del progetto e avviare il server:
    ```bash
    cd server
    php artisan serve
    ```

2. Creazione del modello della risorsa (Post) e della relativa migrazione

    ```bash
    php artisan make:model Post -m
    ```

    aggiungere il codice seguente al file `app/Models/Post.php`

    ```php
    <?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Post extends Model
    {
        protected $fillable = ['title', 'content'];
    }
    ```

3. Modificare il file della migration `database/migrations/xxxx_xx_xx_create_posts_table.php` per aggiungere i campi `title` e `content`

    ```php
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });
    }
    ```

    eseguire il run della migration:

    ```bash
    php artisan migrate
    ```

4. Creare il `controller` per i posts e implementare i metodi: `index`, `show`, `store`, `update` e `destroy`

    ```bash
    php artisan make:controller PostController --api
    ```

5. Creare il file `routes/api.php` e aggiungere le rotte per i posts

    ```php
    use App\Http\Controllers\PostController;
    Route::apiResource('posts', PostController::class);
    ```

6. Aggiungere la stringa `api: __DIR__.'/../routes/api.php',` al file `bootstrap/app.php` all'interno della funzione `configure` per caricare le rotte API

    ```php
    return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__.'/../routes/api.php',      // Aggiungere questa riga per caricare le rotte API
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ...
    ```

7. Effettuare il seed del database con alcuni posts (opzioale ma utile per testare l'API)
    Creare un seeder per i posts:
    ```bash
    php artisan make:seeder PostSeeder
    ```
    Modificare `database/seeders/PostSeeder.php`inserendo il seguente codice all'interno della classe `PostSeeder`, questo codice creerà tre post di esempio nel database:

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

    Eseguire il seeder:

    ```bash 
    php artisan db:seed --class=PostSeeder
    ```

8. Test dell' API:

    - GET all posts: `GET http://localhost:8000/api/posts`
    - GET a single post: `GET http://localhost:8000/api/posts/{id}`
    - CREATE a new post: `POST http://localhost:8000/api/posts` with body `{"title": "New Post", "content": "This is a new post."}`
    - UPDATE a post: `PUT http://localhost:8000/api/posts/{id}` with body `{"title": "Updated Post", "content": "This is an updated post."}`
    - DELETE a post: `DELETE http://localhost:8000/api/posts/{id}`