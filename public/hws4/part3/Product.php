<?php

namespace part3;

abstract class Product
{
    function __construct(public $name, public $price, public $description, public $brand){

    }

    abstract function getProduct();
}