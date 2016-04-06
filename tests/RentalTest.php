<?php

class RentalTest extends PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $movie = new \Src\Movie('hello world', 3);
        $rental = new \Src\Rental($movie, 10);
        return $rental;
    }

    /**
     * @param \Src\Rental $rental
     * @depends testConstruct
     */
    public function testGetDaysRented(\Src\Rental $rental)
    {
        $this->assertEquals(10, $rental->getDaysRented());
    }

    /**
     * @param \Src\Rental $rental
     * @depends testConstruct
     */
    public function testGetMovie(\Src\Rental $rental)
    {
        $this->assertEquals(3, $rental->getMovie()->getPriceCode());
        $this->assertEquals('hello world', $rental->getMovie()->getTitle());
        $rental->getMovie()->setPriceCode(20);
        $this->assertNotEquals(3, $rental->getMovie()->getPriceCode());
        $this->assertEquals(20, $rental->getMovie()->getPriceCode());
        $this->assertEquals(20, $rental->getMovie()->getPriceCode());
    }
}