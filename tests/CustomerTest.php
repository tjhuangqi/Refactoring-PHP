<?php

class CustomerTest extends PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $customer = new \Src\Customer('huang');
        return $customer;
    }

    /**
     * @depends testConstruct
     * @param \Src\Customer $customer
     */
    public function testGetName(\Src\Customer $customer)
    {
        $this->assertEquals('huang', $customer->getName());
    }

    /**
     * @depends testConstruct
     * @param \Src\Customer $customer
     */
    public function testGetRental(\Src\Customer $customer)
    {
        $this->assertEquals([], $customer->getRentals());
    }

    /**
     * @depends testConstruct
     * @depends testGetRental
     * @param \Src\Customer $customer
     * @return \Src\Customer
     */
    public function testAddRental(\Src\Customer $customer)
    {
        $movie1 = new \Src\Movie('test1', \Src\Movie::REGULAR);
        $rental1 = new \Src\Rental($movie1, 10);
        $customer->addRental($rental1);
        $rentals = $customer->getRentals();
        $this->assertEquals(1, count($rentals));
        $storeRental = $rentals[count($rentals) - 1];
        $this->assertEquals($rental1, $storeRental);
        $this->assertEquals($rental1->getMovie(), $storeRental->getMovie());
        $this->assertEquals($rental1->getDaysRented(), $storeRental->getDaysRented());

        $movie2 = new \Src\Movie('test2', \Src\Movie::CHILDREN);
        $rental2 = new \Src\Rental($movie2, 20);
        $customer->addRental($rental2);
        $rentals = $customer->getRentals();
        $this->assertEquals(2, count($rentals));
        $storeRental = $rentals[count($rentals) - 1];
        $this->assertEquals($rental2, $storeRental);
        $this->assertEquals($rental2->getMovie(), $storeRental->getMovie());
        $this->assertEquals($rental2->getDaysRented(), $storeRental->getDaysRented());

        return $customer;
    }

    /**
     * @param \Src\Customer $customer
     * @depends testAddRental
     */
    public function testStatement(\Src\Customer $customer)
    {
        $this->assertEquals('', $customer->statement());
    }
}