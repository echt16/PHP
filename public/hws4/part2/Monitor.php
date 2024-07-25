<?php


namespace part2;

require_once 'Product.php';
class Monitor extends Product
{
    public function __construct($name, $price, $description, $brand, public $diagonal, public $frequency, public $ports)
    {
        parent::__construct($name, $price, $description, $brand);
    }

    public function getProduct(): string
    {
        return "$this->name $this->price $this->description $this->brand $this->diagonal $this->frequency $this->ports";
    }
}

