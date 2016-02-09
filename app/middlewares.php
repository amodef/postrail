<?php
// Middleware

$app->add($app->getContainer()->get('csrf'));

$app->add(function ($request, $response, $next) {
    $this->view->offsetSet("flash", $this->flash);
    return $next($request, $response);
});
