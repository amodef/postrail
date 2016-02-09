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
        /*        
        if ($request->getAttribute('csrf_status') === false) {
            $this->flash->addMessage('error', 'We got a CSRF failure!');                
            return $response->withRedirect('/runner/create');
        }
         */
        
        $data = $request->getParsedBody();
        $runner = new Runner($data);

        if ($runner->save()) {
            $this->flash->addMessage('success', 'Welcome and keep running!');
            return $response->withRedirect('/runner');
        }
        
        $this->flash->addMessage('error', 'We got a problem with your request...');
        return $response->withRedirect('/runner/create');
    }

}