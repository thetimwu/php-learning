<?php

namespace Acme;

// do not need if all files are in the same folder
// use Acme\EbookInterface;

class Ebook implements EbookInterface
{
    public function switchOn()
    {
        var_dump('switch on a book');
    }

    public function clickNextPage()
    {
        var_dump('Click next page buttom');
    }
}
