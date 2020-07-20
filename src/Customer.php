<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Customer extends Eloquent
{
    protected $guarded = [];

    public function getType()
    {
        return $this->type;
    }
}
