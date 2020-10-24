<?php

namespace App\controllers;

use App\core\Application;
use App\core\Controller;
use App\core\Request;
use App\models\User;

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
        $user = new User();
        if ($request->isPost()) {
            $user->loadData($body);
            $user->validate();
            // var_dump($user->errors);
            if ($user->validate() && $user->save()) {
                Application::$app->response->redirect('/');
            }
            echo $this->render('register', ['model' => $user]);
            return;
        }

        if ($request->isGet()) {
            $this->setLayout('auth');
            echo $this->render('register');
            return;
        }
    }
}
