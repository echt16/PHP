<?php
session_start();

if (!isset($_SESSION['categories'])) {
    $_SESSION['categories'] = [];
}
if (!isset($_SESSION['current_category'])) {
    $_SESSION['current_category'] = null;
}
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}
if (!isset($_SESSION['selected_category'])) {
    $_SESSION['selected_category'] = null;
}

function findCategory($categories, $name)
{
    return $categories[$name] ?? null;
}

// Обработка формы для добавления категории
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category_name'])) {
    $category_name = $_POST['category_name'];

    if (!isset($_SESSION['categories'][$category_name])) {
        $_SESSION['categories'][$category_name] = [];
    }

    $_SESSION['current_category'] = $category_name;

    if (!empty($_SESSION['products'])) {
        $_SESSION['categories'][$category_name] = array_merge($_SESSION['categories'][$category_name], $_SESSION['products']);
        $_SESSION['products'] = [];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_name'])) {
    $product_name = $_POST['product_name'];

    $_SESSION['products'][] = $product_name;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['select_category'])) {
    $selected_category = $_GET['select_category'];
    $_SESSION['selected_category'] = $selected_category;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category and Product Management</title>
</head>
<body>
<form method="post" action="">
    <label for="category_name">Category Name:</label>
    <input type="text" id="category_name" name="category_name" required>
    <button type="submit">Add Category</button>
</form>

<form method="post" action="">
    <label for="product_name">Product Name:</label>
    <input type="text" id="product_name" name="product_name" required>
    <button type="submit">Add Product</button>
</form>

<h2>Current Category: <?= $_SESSION['current_category'] ?? 'None' ?></h2>
<h3>Products to Add:</h3>
<ul>
    <?php foreach ($_SESSION['products'] as $product): ?>
        <li><?= htmlspecialchars($product) ?></li>
    <?php endforeach; ?>
</ul>

<h3>Categories:</h3>
<ul>
    <?php foreach (array_keys($_SESSION['categories']) as $category): ?>
        <li>
            <a href="?select_category=<?= urlencode($category) ?>"><?= htmlspecialchars($category) ?></a>
        </li>
    <?php endforeach; ?>
</ul>

<h3>Products in Selected Category:</h3>
<?php
if ($_SESSION['selected_category']) {
    $category_name = $_SESSION['selected_category'];
    $products_in_category = findCategory($_SESSION['categories'], $category_name);
    if ($products_in_category !== null): ?>
        <ul>
            <?php foreach ($products_in_category as $product): ?>
                <li><?= htmlspecialchars($product) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No products found in the selected category.</p>
    <?php endif;
}
?>
</body>
</html>
