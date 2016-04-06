<?php
namespace Src;

class Rental
{
    private $movie;
    private $daysRented;

    public function __construct(Movie $movie, $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function getDaysRented()
    {
        return $this->daysRented;
    }

    public function getMovie()
    {
        return $this->movie;
    }

    public function getAmount()
    {
        $thisAmount = 0;
        switch ($this->movie->getPriceCode()) {
            case  Movie::CHILDREN:
                $thisAmount += 1.5;
                if ($this->daysRented > 3) {
                    $thisAmount += ($this->daysRented - 3) * 1.5;
                }
                break;
            case  Movie::REGULAR:
                $thisAmount += 2;
                if ($this->daysRented > 2) {
                    $thisAmount += ($this->daysRented - 2) * 1.5;
                }
                break;
            case  Movie::NEW_RELEASE:
                $thisAmount += $this->daysRented * 3;
                break;
        }
        return $thisAmount;
    }

    public function getFrequentRenterPoints()
    {
        if ($this->movie->getPriceCode() == Movie::NEW_RELEASE && $this->daysRented > 1) {
            return 2;
        }
        return 1;
    }
}