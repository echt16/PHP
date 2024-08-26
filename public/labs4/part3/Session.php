<?php

namespace part3;
require_once 'Cart.php';

use part3\Cart;
use DateTime;
class Session extends Cart
{
    public array $productList = [];
    public int $sessionId;
    public DateTime $sessionDateTime;
    public function __construct()
    {
        $this->sessionId = rand(0, 10000);
        $this->sessionDateTime = new DateTime();
    }

    public function addToCart($product): void
    {
        $this->productList[] = $product;
    }

    public function getCart() : array
    {
        return $this->productList;
    }

    public function isSessionLive(DateTime $date) : bool
    {
        $timestamp1 = $date->getTimestamp();
        $timestamp2 = $this->sessionDateTime->getTimestamp();

        $secondsDifference = abs($timestamp2 - $timestamp1);

        $minutesDifference = $secondsDifference / 60;

        return ($minutesDifference < 5);
    }
}