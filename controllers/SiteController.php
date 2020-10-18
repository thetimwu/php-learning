<?php

namespace App\controllers;

use App\core\Controller;
use App\core\Request;

class SiteController extends Controller
{
    public function contact()
    {
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

    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        return;
    }
}
