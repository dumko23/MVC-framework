<?php

namespace App\controllers;

use App\core\Application;
use App\core\Controller;
use App\core\Request;

class SiteController extends Controller
{
    public static function handleContact(Request $request): string
    {
        $body = $request->getBody();
        return "Handling submitted data";
    }

    public function home(): bool|array|string
    {
        $params = [
            'name' => 'Stranger'
        ];
        return $this->render('home', $params);
    }

    public function contact(): bool|array|string
    {
        return $this->render('contact');
    }
}