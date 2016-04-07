<?php
namespace Src;

class Customer
{
    private $name;
    private $rentals = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getRentals()
    {
        return $this->rentals;
    }

    public function statement()
    {
        $result = 'Rental Record for ' . $this->getName() . "\n";

        foreach ($this->getRentals() as $rental) {
            $result .= "\t" . $rental->getMovie()->getTitle() . "\t" . $rental->getAmount() . "\n";
        }

        $result .= 'Amount owed is ' . $this->getTotalAmount() . "\n";
        $result .= 'You earned ' . $this->getTotalFrequentRenterPoints() . ' frequent renter points';

        return $result;
    }

    public function getTotalFrequentRenterPoints()
    {
        $result = 0;
        foreach ($this->getRentals() as $rental) {
            $result += $rental->getFrequentRenterPoints();
        }
        return $result;
    }

    public function getTotalAmount()
    {
        $result = 0;
        foreach ($this->getRentals() as $rental) {
            $result += $rental->getAmount();
        }
        return $result;
    }
}