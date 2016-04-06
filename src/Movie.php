<?php
namespace Src;

class Movie
{
    const CHILDREN = 3;
    const REGULAR = 2;
    const NEW_RELEASE = 1;

    private $title;
    private $priceCode;

    public function __construct($title, $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getPriceCode()
    {
        return $this->priceCode;
    }

    public function setPriceCode($priceCode)
    {
        $this->priceCode = $priceCode;
    }
}