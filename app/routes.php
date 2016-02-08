<?php
// Route configuration

$app->get('/authors', 'App\Controllers\AuthorController:listAuthors')->setName('list-authors');
$app->map(['GET', 'POST'], '/authors/{author_id:[0-9]+}/edit', 'App\Controllers\AuthorController:editAuthor')->setName('edit-author');
$app->get('/authors/{author_id:[0-9]+}', 'App\Controllers\AuthorController:listBooks')->setName('author');
$app->get('/books', 'App\Controllers\BookController:listBooks')->setName('list-books');
$app->get('/runner', 'App\Controllers\RunnerController:index')->setName('index-runner');