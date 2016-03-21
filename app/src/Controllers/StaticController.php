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

    public function about($request, $response)
    {
        return $this->view->render($response, 'static/about.twig');
    }

    public function contact($ques, $resp)
    {
        $data = $ques->getParsedBody();

        // Google reCaptcha
        $g = $this->recaptcha->verify($data['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

        if ($g->isSuccess()) {

            // Envoi du mail de contact
            $body = $this->view->fetch('mail/contact.twig', ['contact' => $data]);
            $message = \Swift_Message::newInstance('Message en provenance de www.postrail.org')
                ->setFrom([$data['email'] => $data['name']])
                ->setTo(['info@postrail.org' => 'Postrail'])
                ->setBody($body, 'text/html');                
            $this->mailer->send($message);

            // Retour à la page "à propos" avec message
            $this->flash->addMessage('success', 'Votre message a été envoyé !');
            return $resp->withRedirect('/about#contact');
        }

        $data['error'] = 'Il y a eu une erreur lors de l\'envoi de votre message.';

        $this->flash->addMessage('error', $data['error']);
        return $resp->withRedirect('/about#contact');
    }

}