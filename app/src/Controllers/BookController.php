<?php
namespace App\Controllers;

use Slim\Views\Twig;
use Slim\Router;
use Slim\Flash\Messages as FlashMessages;
use App\Author;
use App\Book;

final class BookController
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

    public function listBooks($request, $response, $params)
    {
        return $this->view->render($response, 'book/list.twig', [
            'books' => Book::all(),
        ]);
    }
}
