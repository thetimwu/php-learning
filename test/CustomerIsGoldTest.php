<?php
require_once  'vendor/autoload.php';

use App\Customer;
use App\CustomerIsGold;

class CustomerIsGoldTest extends PHPUnit\Framework\TestCase
{

    /** @test */
    function a_customer_is_gold_if_they_have_the_respective_type()
    {
        $glodCustomer = new Customer(['type' => 'gold']);
        $silverCustomer = new Customer(['type' => 'silver']);

        $specification = new CustomerIsGold;

        $this->assertTrue($specification->isSatisfiedBy($glodCustomer));
        $this->assertFalse($specification->isSatisfiedBy($silverCustomer));
    }
}
