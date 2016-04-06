<?php

class MovieTest extends PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $movie = new \Src\Movie('ss', 1);
        return $movie;
    }

    /**
     * @depends testConstruct
     * @param \Src\Movie $movie
     */
    public function testGetTitle(\Src\Movie $movie)
    {
        $this->assertEquals('ss', $movie->getTitle());
    }

    /**
     * @depends testConstruct
     * @param \Src\Movie $movie
     */
    public function testGetPriceCode(\Src\Movie $movie)
    {
        $this->assertEquals(1, $movie->getPriceCode());
    }

    /**
     * @depends testConstruct
     * @depends testGetPriceCode
     * @param \Src\Movie $movie
     */
    public function testSetPriceCode(\Src\Movie $movie)
    {
        $movie->setPriceCode(20);
        $this->assertEquals(20, $movie->getPriceCode());
    }
}