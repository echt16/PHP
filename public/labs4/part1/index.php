<?php
require_once 'product.php';
session_start();
$products = [];
$productsForSearch = [];
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
} else {
    $products = $_SESSION['products'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name']) && isset($_POST['price'])) {
    $products[] = new Product($_POST['name'], $_POST['price']);
    $_SESSION['products'] = $products;
}

function printProducts($products): void
{
    foreach ($products as $product) {
        echo $product->getProduct();
    }
}

function searchProducts($products, $needle): array
{
    return array_filter($products, function ($product) use ($needle) {
        if (str_contains($product->_name, $needle)) {
            return true;
        }
        return false;
    });
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="padding: 20px 20px;">
<form method="post">
    <div class="form-group">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
        <label class="form-label">Price</label>
        <input type="number" class="form-control" name="price">
    </div>
    <button class="btn btn-primary">Add</button>
</form>
<?php printProducts($products); ?>
<hr/>
<form method="post">
    <div class="form-group">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="nameForSearch">
    </div>
    <button class="btn btn-primary">Search</button>
</form>
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nameForSearch'])){
    printProducts(searchProducts($products, $_POST['nameForSearch']));
} ?>
</body>
</html>
