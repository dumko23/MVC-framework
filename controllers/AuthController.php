<?php

namespace App\controllers;

use App\core\Controller;
use App\core\Request;
use App\models\RegisterModel;

class AuthController extends Controller
{

    public function login(): bool|array|string
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request): bool|array|string
    {
        $registerModel = new RegisterModel();

        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());

            if ($registerModel->validation() && $registerModel->register()) {
                return 'Success';
            }
            return $this->render('register', [
                'model' => $registerModel
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }
}