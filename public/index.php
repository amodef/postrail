<?php
// All file paths relative to root
chdir(dirname(__DIR__));

require 'vendor/autoload.php';
session_start();

$settings = require 'config/settings.php';

// Instantiate Slim
$app = new \Slim\App($settings);

require 'app/src/dependencies.php';
require 'app/src/middleware.php';

// Register the routes
require 'app/src/routes.php';

// Register the database connection with Eloquent
$capsule = $app->getContainer()->get('capsule');
$capsule->bootEloquent();

$app->run();
