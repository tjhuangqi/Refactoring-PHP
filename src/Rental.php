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
        switch ($this->getMovie()->getPriceCode()) {
            case  Movie::CHILDREN:
                $thisAmount += 1.5;
                if ($this->getDaysRented() > 3) {
                    $thisAmount += ($this->getDaysRented() - 3) * 1.5;
                }
                break;
            case  Movie::REGULAR:
                $thisAmount += 2;
                if ($this->getDaysRented() > 2) {
                    $thisAmount += ($this->getDaysRented() - 2) * 1.5;
                }
                break;
            case  Movie::NEW_RELEASE:
                $thisAmount += $this->getDaysRented() * 3;
                break;
        }
        return $thisAmount;
    }

    public function getFrequentRenterPoints()
    {
        if ($this->getMovie()->getPriceCode() == Movie::NEW_RELEASE && $this->getDaysRented() > 1) {
            return 2;
        }
        return 1;
    }
}