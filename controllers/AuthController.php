<?php

namespace App\controllers;

use App\core\Application;
use App\core\Controller;
use App\core\Request;
use App\core\Response;
use App\models\LoginForm;
use App\models\User;

class AuthController extends Controller
{
    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        echo $this->render('login', ['model' => $loginForm]);
        return;
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    // public function handleLogin(Request $request)
    // {
    //     $body = $request->getBody();
    //     var_dump($body);
    //     return;
    // }

    public function register(Request $request)
    {
        $body = $request->getBody();
        $user = new User();
        if ($request->isPost()) {
            $user->loadData($body);
            $user->validate();
            // var_dump($user->errors);
            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
            }

            echo $this->render('register', ['model' => $user]);
            return;
        }

        if ($request->isGet()) {
            $this->setLayout('auth');
            echo $this->render('register', ['model' => $user]);
            return;
        }
    }
}
