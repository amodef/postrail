<?php

require __DIR__ . '/../vendor/autoload.php';

session_start();

$settings = require __DIR__ . '/../config/settings.php';

// Instantiate Slim
$app = new \Slim\App($settings);

require __DIR__ . '/../app/dependencies.php';
require __DIR__ . '/../app/middlewares.php';

// Register the routes
require __DIR__ . '/../app/routes.php';

// Register the database connection with Eloquent
$capsule = $app->getContainer()->get('capsule');
$capsule->bootEloquent();

$app->run();