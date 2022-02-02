<?php

namespace App\controllers;

use App\core\Controller;
use App\core\Request;

class AuthController extends Controller
{

    public function login(): bool|array|string
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request): bool|array|string
    {
        if($request->isPost()){
            return 'Handle submitted data';
        }
        $this->setLayout('auth');
        return $this->render('register');
    }
}