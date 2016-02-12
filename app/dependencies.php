<?php

// DIC configuration
$container = $app->getContainer();

// Database
$container['capsule'] = function ($c) {
    $capsule = new Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($c['settings']['db']);
    return $capsule;
};

// View
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig($c['settings']['view']['template_path'], $c['settings']['view']['twig']);

    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $c['request']->getUri()));
    $view->addExtension(new Twig_Extension_Debug());
    $view->addExtension(new App\Controllers\TwigExtension($c['flash']));

    return $view;
};

// CSRF guard
$container['csrf'] = function ($c) {
    $guard = new \Slim\Csrf\Guard();
    $guard->setFailureCallable(function ($request, $response, $next) {
        $request = $request->withAttribute("csrf_status", false);
        return $next($request, $response);
    });
    return $guard;
};

// Flash messages
$container['flash'] = function () {
    return new \Slim\Flash\Messages;
};

// SwiftMailer
$container['mailer'] = function ($c) {
    $transport = \Swift_SmtpTransport::newInstance($c['settings']['mail']['host'], $c['settings']['mail']['port'])
        ->setEncryption($c['settings']['mail']['encryption'])
        ->setUsername($c['settings']['mail']['username'])
        ->setPassword($c['settings']['mail']['password']);
    $mailer = \Swift_Mailer::newInstance($transport);
    return $mailer;
};

// Container and route binder
$container['App\Controllers\StaticController'] = function ($c) {
    return new App\Controllers\StaticController($c['view'], $c['router'], $c['flash']);
};

$container['App\Controllers\RunnerController'] = function ($c) {

    return new App\Controllers\RunnerController($c['view'], $c['router'], $c['flash'], $c['mailer']);
};
