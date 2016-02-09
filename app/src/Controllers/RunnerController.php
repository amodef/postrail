<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Runner;

final class RunnerController extends Controller
{

    public function index($request, $response)
    {
        return $this->view->render($response, 'runner/index.twig', [
            'runners' => Runner::all()
        ]);
    }

    public function create($request, $response)
    {
        return $this->view->render($response, 'runner/create.twig');
    }

    public function store($request, $response)
    {
        $data = $request->getParsedBody();
        $runner = new Runner($data);

        if ($runner->save()) {
            return $response->withRedirect('/runner');
        }
        return $response->withRedirect('/runner/create');
    }

}