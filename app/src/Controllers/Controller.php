<?php
namespace App\Controllers;

use Slim\Views\Twig;
use Slim\Router;
use Slim\Flash\Messages as FlashMessages;

class Controller
{
    protected $view;
    protected $router;
    protected $flash;

    public function __construct(Twig $view, Router $router, FlashMessages $flash)
    {
        $this->view = $view;
        $this->router = $router;
        $this->flash = $flash;
    }
    
} 
