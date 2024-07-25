<?php
session_start();
require_once 'Monitor.php';
require_once 'Product.php';
require_once 'Phone.php';
require_once 'MonitorCategory.php';
require_once 'PhoneCategory.php';

use part2\Monitor;
use part2\Product;
use part2\Phone;
use part2\MonitorCategory;
use Part2\PhoneCategory;

$categories = [
    'Phones' => new PhoneCategory('Phones'),
    'Monitors' => new MonitorCategory('Monitors')
];

$monitor1 = new Monitor("Monitor A", 299.99, "High resolution monitor", "Dell", 27, "144Hz", "HDMI, DisplayPort, USB");
$monitor2 = new Monitor("Monitor B", 199.99, "Budget monitor", "LG", 24, "60Hz", "HDMI, VGA");
$monitor3 = new Monitor("Monitor C", 155.99, "Budget monitor", "LG", 29, "60Hz", "HDMI, VGA");
$phone1 = new Phone("Phone A", 499.99, "High-end smartphone", "Apple", "A13 Bionic", 4, 2, 64, "iOS");
$phone2 = new Phone("Phone B", 299.99, "Mid-range smartphone", "Samsung", "Exynos 9611", 6, 1, 128, "Android");
$phone3 = new Phone("Phone C", 199.99, "Budget smartphone", "Xiaomi", "Snapdragon 660", 3, 2, 32, "Android");

$categories['Monitors']->listProduct[] = $monitor1;
$categories['Monitors']->listProduct[] = $monitor2;
$categories['Monitors']->listProduct[] = $monitor3;

$categories['Phones']->listProduct[] = $phone1;
$categories['Phones']->listProduct[] = $phone2;
$categories['Phones']->listProduct[] = $phone3;

$selectedItems = [];
$filters = [];


$category = $_SESSION['category'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category'])) {
    $category = $_POST['category'];
    $_SESSION['category'] = $category;
}

if ($category != '') {
    $selectedItems = $categories[$category]->listProduct;
    $filters = $categories[$category]->filters;
}

foreach ($filters as $filter) {
    $min = null;
    $max = null;
    if (isset($_POST[$filter]) && $_POST[$filter] !== '') {
        $filt = $_POST[$filter];
        if (preg_match("/[;,.-]/", $filt)) {
            $values = preg_split("/[;,.-]/", $filt, -1, PREG_SPLIT_NO_EMPTY);
            if (isset($values[0]) && is_numeric(trim($values[0]))) {
                $min = floatval(trim($values[0]));
            }
            if (isset($values[1]) && is_numeric(trim($values[1]))) {
                $max = floatval(trim($values[1]));
            }
        } else {
            if (is_numeric(trim($filt))) {
                $min = floatval(trim($filt));
            }
        }
        $selectedItems = array_filter($selectedItems, function ($item) use ($min, $max, $filter) {
            if (isset($min) && isset($max)) {
                if ($item->$filter >= $min && $item->$filter <= $max) {
                    return true;
                }
            } elseif (isset($min)) {
                if ($item->$filter >= $min) {
                    return true;
                }
            }
            return false;
        });
    }
}


function setPlaceHolder($elements, $filter): string
{
    $max = null;
    $min = null;
    $minVal = 0;
    $maxVal = 0;
    foreach ($elements as $element) {
        if ($max === null || $element->$filter > $max->$filter) {
            $max = $element;
            $maxVal = $element->$filter;
        }
        if ($min === null || $element->$filter < $min->$filter) {
            $min = $element;
            $minVal = $element->$filter;
        }
    }
    return "Min:$minVal;Max:$maxVal";
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category Selection</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px 20px;
        }

        .li-item {
            border-radius: 10px;
            background-color: rgba(80, 80, 255, 0.29);
            padding: 10px 20px;
            cursor: pointer;
            margin-bottom: 10px;
            list-style: none;
        }

        .li-item:hover {
            background-color: rgba(80, 80, 255, 0.8);
            color: white;
        }

        .category-list, .product-list {
            padding: 0;
        }

        .product-item {
            list-style: none;
        }
    </style>
</head>
<body>

<div>
    <h2>Categories</h2>
    <ul class="category-list">
        <?php foreach ($categories as $tmp_category => $values): ?>
            <form method="post">
                <li class="li-item" onclick="this.closest('form').submit();">
                    <input type="hidden" name="category" value="<?= $tmp_category ?>">
                    <?= htmlspecialchars($tmp_category) ?>
                </li>
            </form>
        <?php endforeach; ?>
    </ul>

    <?php if ($category !== ''): ?>
        <form method="post">
            <div class="form-row">
                <?php foreach ($filters as $filter): ?>
                    <div class="form-group col">
                        <label><?php echo htmlspecialchars($filter); ?>:</label>
                        <input onchange="this.parentElement.parentElement.children[this.parentElement.parentElement.children.length - 1].style.display = 'block'"
                               type="text" name="<?php echo $filter; ?>"
                               class="form-control"
                               placeholder="<?php echo setPlaceHolder($categories[$category]->listProduct, $filter); ?>"
                        >
                    </div>
                <?php endforeach; ?>
                <button style="display: none;" class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
        <h2>Products in selected category</h2>
        <ul class="product-list">
            <?php if (!empty($selectedItems)): ?>
                <?php foreach ($selectedItems as $item): ?>
                    <li class="product-item li-item"><?= $item->getProduct(); ?></li>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No products in this category.</p>
            <?php endif; ?>
        </ul>
    <?php endif; ?>
</div>
</body>
</html>
