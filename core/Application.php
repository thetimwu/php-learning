<?php

namespace App\core;

class Application
{
    public string $userclass;
    public Router $router;
    public Request $request;
    public Response $response;
    public static string $ROOT_DIR;
    public static Application $app;
    public controller $controller;
    public Database $db;
    public Session $session;
    public ?DBModel $user;

    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->controller = new Controller();
        $this->db = new Database($config['db']);
        $this->session = new Session();

        $this->userclass = $config['userClass'];
        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userclass::primaryKey();
            $this->user = $this->userclass::findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    public function run()
    {
        $this->router->resolve();
    }

    public function login(DBModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryVal = $user->{$primaryKey};
        $this->session->set('user', $primaryVal);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }
}
