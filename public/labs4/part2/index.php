<?php

use part2\Monitor;
use part2\Phone;


require_once "Monitor.php";
require_once "Phone.php";

$monitor1 = new Monitor("Monitor A", 299.99, "High resolution monitor", "Dell", 27, "144Hz", "HDMI, DisplayPort, USB");
$monitor2 = new Monitor("Monitor B", 199.99, "Budget monitor", "LG", 24, "60Hz", "HDMI, VGA");
$phone1 = new Phone("Phone A", 499.99, "High-end smartphone", "Apple", "A13 Bionic", 4, 2, 64, "iOS");
$phone2 = new Phone("Phone B", 299.99, "Mid-range smartphone", "Samsung", "Exynos 9611", 6, 1, 128, "Android");
$phone3 = new Phone("Phone C", 199.99, "Budget smartphone", "Xiaomi", "Snapdragon 660", 3, 2, 32, "Android");

$products = [
    $monitor1,
    $monitor2,
    $phone1,
    $phone2,
    $phone3
];

foreach ($products as $product) {
    echo  $product->getProduct() . "<br/><br/>";
}
