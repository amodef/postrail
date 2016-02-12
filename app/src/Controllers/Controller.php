<?php
namespace App\Controllers;

use Slim\Views\Twig;
use Slim\Router;
use Slim\Flash\Messages as FlashMessages;
use Swift_Mailer;

class Controller
{
    protected $view;
    protected $router;
    protected $flash;
    protected $mailer;

    public function __construct(Twig $view, Router $router, FlashMessages $flash, Swift_Mailer $mailer = null)
    {
        $this->view = $view;
        $this->router = $router;
        $this->flash = $flash;
        $this->mailer = $mailer;
    }
    
} 
