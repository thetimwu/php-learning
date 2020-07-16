<?php

namespace App;

abstract class Sub
{
    public function make()
    {
        $this->layBread();
        $this->addTopping();
        $this->addSource();
    }

    protected function layBread()
    {
        var_dump('lay 2 bread');
    }

    protected function addSource()
    {
        var_dump('add some source');
    }

    abstract function addTopping();
}
