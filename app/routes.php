<?php

// static routes
$app->get('/', 'App\Controllers\StaticController:home')->setName('home');
$app->get('/rules', 'App\Controllers\StaticController:rules')->setName('rules');

// runner routes
$app->get('/runner', 'App\Controllers\RunnerController:index')->setName('runner.index');
$app->get('/runner/create', 'App\Controllers\RunnerController:create')->setName('runner.create');
$app->post('/runner', 'App\Controllers\RunnerController:store')->setName('runner.store');
$app->get('/runner/{runner:[0-9]+}', 'App\Controllers\RunnerController:show')->setName('runner.show');
$app->delete('/runner/{runner:[0-9]+}', 'App\Controllers\RunnerController:delete')->setName('runner.delete');