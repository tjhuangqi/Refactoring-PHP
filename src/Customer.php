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
        $totalAmount = 0;
        $frequentRenterPoints = 0;

        $result = 'Rental Record for ' . $this->getName() . "\n";

        foreach ($this->rentals as $rental) {

            $thisAmount = $rental->getAmount();

            $frequentRenterPoints += $rental->getFrequentRenterPoints();

            $result .= "\t" . $rental->getMovie()->getTitle() . "\t" . (string)$thisAmount . "\n";

            $totalAmount += $thisAmount;
        }

        $result .= "Amount owed is $totalAmount \n";
        $result .= "You earned $frequentRenterPoints frequent renter points";

        return $result;
    }
}