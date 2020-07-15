<?php

class BasicService
{
    public function getCost()
    {
        return 20;
    }
}

echo (new BasicService)->getCost();
