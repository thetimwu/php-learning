<?php

require 'vendor/autoload.php';

use Acme\Book;
use Acme\Ebook;
use Acme\Adapter;
use Acme\BookInterface;

class Person
{
  public function read(BookInterface $book)
  {
    $book->open();
    $book->turnpage();
  }
}

(new Person)->read(new Adapter(new Ebook));
