<?php
namespace App\Controllers;

use Slim\Views\Twig;
use Slim\Router;
use Slim\Flash\Messages as FlashMessages;
use Swift_Mailer;
use ReCaptcha\ReCaptcha;

class Controller
{
    protected $view;
    protected $router;
    protected $flash;
    protected $mailer;

    public function __construct(Twig $view, Router $router, FlashMessages $flash, Swift_Mailer $mailer = null, ReCaptcha $recaptcha = null)
    {
        $this->view = $view;
        $this->router = $router;
        $this->flash = $flash;
        $this->mailer = $mailer;
        $this->recaptcha = $recaptcha;
    }
    
} 
