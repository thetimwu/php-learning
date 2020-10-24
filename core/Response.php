<?php

namespace App\core;

class Response
{

    public function setStatusCode(int $code)
    {
        return http_response_code($code);
    }

    public function redirect(string $str)
    {
        header('Location: ' . $str);
    }
}
