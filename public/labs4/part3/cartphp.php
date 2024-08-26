<?php

require_once "Monitor.php";
require_once "Product.php";
require_once "Phone.php";
require_once "MonitorCategory.php";
require_once "PhoneCategory.php";
require_once "Session.php";

session_start();
use part3\Session;

$session = $_SESSION['session'] ?? new Session();
$products = $session->getCart();


foreach ($products as $product) {
    echo "<p>{$product->name}</p>";
}
