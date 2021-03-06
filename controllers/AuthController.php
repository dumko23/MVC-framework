<?php

namespace App\controllers;

use Dumko23\PhpMvcCore\Application;
use Dumko23\PhpMvcCore\Controller;
use Dumko23\PhpMvcCore\middlewares\AuthMiddleware;
use Dumko23\PhpMvcCore\Request;
use Dumko23\PhpMvcCore\Response;
use App\models\LoginForm;
use App\models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validation() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
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

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {

        return $this->render('profile');
    }

}