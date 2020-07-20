<?php

namespace App;

class CustomerRepository
{
    protected $customers;

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

    public function matchingSepcification($specification)
    {
        $customers = Customer::query();

        $customers = $specification->asScope($customers);

        return $customers->get();
    }

    public function all()
    {
        return Customer::all();
    }
}
