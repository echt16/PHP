<?php

namespace part3;
abstract class Cart
{
    abstract function getCart();
    abstract function addToCart($product);
}