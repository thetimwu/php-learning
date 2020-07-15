<?php

namespace Acme;

// use Acme\BookInterface;
// use EbookInterface;
use Ebook;

class Adapter implements BookInterface
{

    private $ebook;

    public function __construct(EbookInterface $ebook)
    {
        $this->ebook = $ebook;
    }

    public function open()
    {
        return $this->ebook->switchOn();
    }

    public function turnPage()
    {
        return $this->ebook->ClickNextPage();
    }
}
