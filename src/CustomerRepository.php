<?php

namespace App;

class CustomerRepository
{
    protected $customers;

    public function __construct(array $customers)
    {
        $this->customers = $customers;
    }

    public function bySpecification($specification)
    {
        $matches = [];
        foreach ($this->customers as $customer) {
            if ($specification->isSatisfiedBy($customer)) {
                $matches[] = $specification->isSatisfiedBy($customer);
            }
        }
        return $matches;
    }

    public function all()
    {
        return $this->customers;
    }
}
