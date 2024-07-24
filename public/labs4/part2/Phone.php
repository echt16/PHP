<?php

namespace part2;

require_once 'Product.php';
class Phone extends Product
{
    function __construct($name, $price, $description, $brand, public $cpu, public $ram, public $countSim, public $hdd, public $os){
        parent::__construct($name, $price, $description, $brand);
    }

    function getProduct() : string
    {
        return "$this->name $this->price $this->description $this->brand $this->cpu $this->ram $this->countSim $this->hdd $this->os";
    }
}