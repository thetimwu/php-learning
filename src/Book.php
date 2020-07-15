<?php

namespace Acme;

use Acme\BookInterface;

class Book implements BookInterface
{
    public function open()
    {
        var_dump('openning a book');
    }

    public function turnPage()
    {
        var_dump('turnning a page');
    }
}
