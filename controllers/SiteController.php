<?php

namespace App\controllers;

use Dumko23\PhpMvcCore\Application;
use Dumko23\PhpMvcCore\Controller;
use Dumko23\PhpMvcCore\Request;
use Dumko23\PhpMvcCore\Response;
use App\models\ContactForm;

class SiteController extends Controller
{

    public function home(): bool|array|string
    {
        $params = [
            'name' => 'Stranger'
        ];
        return $this->render('home', $params);
    }

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if($request->isPost()){
            $contact->loadData($request->getBody());
            if($contact->validation() && $contact->send()){
                Application::$app->session->setFlash('success', "Thanks for your message!");
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', [
            'model' => $contact
        ]);
    }
}