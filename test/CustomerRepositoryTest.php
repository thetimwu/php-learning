<?php

use App\CustomerIsGold;
use App\CustomerRepository;
use App\Customer;

class CustomerRepositoryTest extends PHPUnit\Framework\TestCase
{
    protected $customers;

    public function setUp(): void
    {
        $this->customers = new CustomerRepository(
            [
                new Customer('gold'),
                new Customer('silver'),
                new Customer('gold'),
                new Customer('bronze')
            ]
        );
    }

    /** @test */
    function it_fetches_all_customers()
    {
        $results = $this->customers->all();

        $this->assertCount(4, $results);
    }

    /** @test */
    function it_fetches_all_customers_who_match_a_given_specification()
    {
        $customers = new CustomerRepository(
            [
                new Customer('gold'),
                new Customer('silver'),
                new Customer('gold'),
                new Customer('bronze')
            ]
        );

        $spec = new CustomerIsGold;

        $results  = $customers->bySpecification($spec);

        $this->assertCount(2, $results);
    }
}
