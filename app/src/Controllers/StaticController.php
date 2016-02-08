<?php
namespace App\Controllers;

use Slim\Views\Twig;
use Slim\Router;
use Slim\Flash\Messages as FlashMessages;

final class StaticController
{
    private $view;
    private $router;
    private $flash;

    public function __construct(Twig $view, Router $router, FlashMessages $flash)
    {
        $this->view = $view;
        $this->router = $router;
        $this->flash = $flash;
    }

    public function home($request, $response)
    {
        return $this->view->render($response, 'static/home.twig');
    }

    public function rules($request, $response)
    {
        return $this->view->render($response, 'static/rules.twig');
    }

}