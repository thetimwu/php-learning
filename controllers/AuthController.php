<?php

namespace App\controllers;

use App\core\Controller;
use App\core\Request;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        echo $this->render('login');
        return;
    }

    public function handleLogin(Request $request)
    {
        $body = $request->getBody();
        var_dump($body);
        return;
    }

    public function register()
    {
        $this->setLayout('auth');
        echo $this->render('register');
        return;
    }

    public function handleRegister(Request $request)
    {
        $body = $request->getBody();
        var_dump($body);
        return;
    }
}
