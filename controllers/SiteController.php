<?php

namespace App\controllers;

use App\core\Application;
use App\core\Controller;
use App\core\Request;
use App\core\Response;
use App\models\ContactForm;

class SiteController extends Controller
{
    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks for contacting us');
                return $response->redirect('/contact');
            }
        }
        $this->setLayout('main');
        echo $this->render('contact');
        return;
    }

    public function user()
    {
        $this->setLayout('main');
        $name = ['name' => 'tim'];
        echo $this->render('user', $name);
        return;
    }
}
