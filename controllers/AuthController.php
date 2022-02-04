<?php

namespace App\controllers;

use App\core\Application;
use App\core\Controller;
use App\core\Request;
use App\models\User;

class AuthController extends Controller
{

    public function login(): bool|array|string
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request): bool|array|string
    {
        $user = new User();

        if ($request->isPost()) {
            $user->loadData($request->getBody());

            if ($user->validation() && $user->save()) {
                Application::$app->session->setFlash('success', 'Registration completed!');
                Application::$app->response->redirect('/');
            }
            return $this->render('register', [
                'model' => $user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $user
        ]);
    }
}