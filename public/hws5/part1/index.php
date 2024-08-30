<?php
require_once "Product.php";

use part1\Product;

session_start();

$items = $_SESSION['items'] ?? [];

if (isset($_POST['addItem'])) {
    $items[] = new Product($_POST['name'], $_POST['count'], $_POST['price']);
    $_SESSION['items'] = $items;
} elseif (isset($_POST['buy'])) {
    if (file_exists('ticket.xml')) {
        $xml = simplexml_load_file('ticket.xml');
        $itemsXml = $xml->items;
    } else {
        $xml = new SimpleXMLElement('<ticket></ticket>');
        $xml->addChild('date', (new DateTime())->format('d-m-Y'));
        $itemsXml = $xml->addChild('items');
    }
    foreach ($items as $item) {
        $itemXml = $itemsXml->addChild('item');
        $itemXml->addAttribute('name', $item->getName());
        $itemXml->addChild('count', $item->getCount());
        $itemXml->addChild('price', $item->getPrice());
        $itemXml->addChild('total', $item->getCount() * $item->getPrice());
    }
    $items = [];
    $xml->saveXML('ticket.xml');
//    if (file_exists('ticket.xml')) {
//        $i = 1;
//        while (file_exists('ticket(' . $i . ').xml')) {
//            $i++;
//        }
//        $xml->saveXML('ticket(' . $i . ').xml');
//    } else
//        $xml->saveXML('ticket.xml');

}
elseif(isset($_POST['getTickets'])) {
    header('Location: tickets.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<form class="container mt-5" method="post">
    <div class="form-group mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group mb-3">
        <label for="count" class="form-label">Count</label>
        <input type="number" name="count" class="form-control" required>
    </div>
    <div class="form-group mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" name="price" class="form-control" required>
    </div>
    <button type="submit" name="addItem" class="btn btn-primary">Add item</button>
</form>
<form method="post" class="container mt-5">
    <button type="submit" name="buy" class="btn btn-success">Buy</button>
</form>
<form method="post" class="container mt-5">
    <button type="submit" name="getTickets" class="btn btn-success">Get tickets</button>
</form>
</body>
</html>
