<?php

use App\CustomerIsGold;
use App\CustomerRepository;
use App\Customer;
use Illuminate\Database\Capsule\Manager as Database;


class CustomerRepositoryTest extends PHPUnit\Framework\TestCase
{
    protected $customers;

    public function setUp(): void
    {
        $this->setUpDatabase();

        $this->migrateTables();

        $this->customers = new CustomerRepository;
    }

    protected function setUpDatabase()
    {
        $database = new Database;

        $database->addConnection([
            'driver' => 'sqlite',
            'database' => ':memory'
        ]);

        $database->bootEloquent();

        $database->setAsGlobal();
    }

    protected function migrateTables()
    {
        Database::schema()->create('customers', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });

        Customer::create(['name' => 'Joe', 'type' => 'gold']);
        Customer::create(['name' => 'Jane', 'type' => 'silver']);
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

        $spec = new CustomerIsGold;

        $results  = $this->customers->bySpecification($spec);

        $this->assertCount(1, $results);
    }
}
