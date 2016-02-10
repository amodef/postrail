<?php
namespace App\Controllers;

use App\Controllers\Controller;
use App\Runner;

final class RunnerController extends Controller
{

    public function index($ques, $resp)
    {
        return $this->view->render($resp, 'runner/index.twig', [
            'runners' => Runner::all()
        ]);
    }

    public function create($ques, $resp)
    {
        return $this->view->render($resp, 'runner/create.twig');
    }

    public function store($ques, $resp)
    {        
        $data = $ques->getParsedBody();
        $runner = new Runner();

        $runner->error = 'Please fill in all the required fields.';
        if ($runner->validate($data)) {
            if ($runner->create($data)) {
                $this->flash->addMessage('success', 'Welcome and keep running!');
                return $resp->withRedirect('/runner');
            }
            $runner->error = 'We were unable to store your datas.';
        }

        $this->flash->addMessage('error', $runner->error);
        return $resp->withRedirect('/runner/create');
    }

    public function show($ques, $resp, $args)
    {
        $runner_id = $args['runner'];

        return $this->view->render($resp, 'runner/show.twig', [
            'runner' => Runner::find($runner_id)
        ]);
    }

    public function delete($ques, $resp, $args)
    {
        $runner_id = $args['runner'];

        if (Runner::destroy($runner_id)) {
            $this->flash->addMessage('success', 'User removed.');
            return $resp->withRedirect('/runner');
        }

        $this->flash->addMessage('error', 'We were unable to delete this entry.');
        return $resp->withRedirect('/runner/' . $runner_id);
    }

}