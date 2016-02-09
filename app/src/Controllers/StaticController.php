<?php
namespace App\Controllers;

use App\Controllers\Controller;

final class StaticController extends Controller
{

    public function home($request, $response)
    {
        return $this->view->render($response, 'static/home.twig');
    }

    public function rules($request, $response)
    {
        return $this->view->render($response, 'static/rules.twig');
    }

}