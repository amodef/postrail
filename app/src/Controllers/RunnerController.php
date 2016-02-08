<?php
namespace App\Controllers;

use Slim\Views\Twig;
use Slim\Router;
use Slim\Flash\Messages as FlashMessages;
use App\Runner;

final class RunnerController
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

    public function index($request, $response)
    {
        return $this->view->render($response, 'runner/index.twig', [
            'runners' => Runner::all()
        ]);
    }

}