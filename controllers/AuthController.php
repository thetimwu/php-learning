<?php

namespace App\controllers;

use App\core\Controller;
use App\core\Request;
use App\models\RegisterModel;

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

    public function register(Request $request)
    {
        $body = $request->getBody();
        $registerModel = new RegisterModel();
        if ($request->isPost()) {
            $registerModel->loadData($body);
            $registerModel->validate();
            // var_dump($registerModel->errors);
            if ($registerModel->validate() && $registerModel->register()) {
                echo 'success';
            }
            echo $this->render('register', ['model' => $registerModel]);
            return;
        }

        if ($request->isGet()) {
            $this->setLayout('auth');
            echo $this->render('register');
            return;
        }
    }
}
