<?php
// Route configuration
//$app->map(['GET', 'POST'], '/authors/{author_id:[0-9]+}/edit', 'App\Controllers\AuthorController:editAuthor')->setName('edit-author');
//$app->get('/authors/{author_id:[0-9]+}', 'App\Controllers\AuthorController:listBooks')->setName('author');

// static routes
$app->get('/', 'App\Controllers\StaticController:home')->setName('home');
$app->get('/rules', 'App\Controllers\StaticController:rules')->setName('rules');

// runner routes
$app->get('/runner', 'App\Controllers\RunnerController:index')->setName('runner.index');
$app->get('/runner/create', 'App\Controllers\RunnerController:create')->setName('runner.create');
$app->post('/runner', 'App\Controllers\RunnerController:store')->setName('runner.store');