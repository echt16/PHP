<?php

class Product
{
    public function __construct(public string $_name, public string $_price)
    {

    }

    function getProduct(): string
    {
        return "<p>Name: $this->_name, Price: $this->_price</p><br/>";
    }
}