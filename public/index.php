<?php
// All file paths relative to root
chdir(dirname(__DIR__));

require 'vendor/autoload.php';
session_start();

$settings = require 'config/settings.php';

// Instantiate Slim
$app = new \Slim\App($settings);

require 'app/dependencies.php';
require 'app/middlewares.php';

// Register the routes
require 'app/routes.php';

// Register the database connection with Eloquent
$capsule = $app->getContainer()->get('capsule');
$capsule->bootEloquent();

$app->run();
