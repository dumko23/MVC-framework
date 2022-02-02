<?php

namespace App\controllers;

use App\core\Application;

class SiteController
{
    public static function handleContact()
    {
        return "Handling submitted data";
    }

    public static function home()
    {
        $params = [
            'name' => 'Stranger'
        ];
        return Application::$app->router->renderView('home', $params);
    }

    public static function contact()
    {
        return Application::$app->router->renderView('contact');
    }
}