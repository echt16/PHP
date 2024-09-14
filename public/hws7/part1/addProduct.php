<?php
$categories = [];

$conn = mysqli_connect("localhost", "root", "password", "Shop");
$query = "SELECT * FROM categories";

if ($result = $conn->query($query)) {
    foreach ($result as $row) {
        $categories[] = $row;
    }
}

$conn->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = (int)$_POST["price"];
    $make = $_POST["make"];
    $model = $_POST["model"];
    $country = $_POST["country"];
    $description = $_POST["description"];
    $categoryId = (int)$_POST["category"];

    $conn = new mysqli("localhost", "root", "password", "Shop");

    $checkQuery = "SELECT * FROM products WHERE name = '$name'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        $query = "UPDATE products SET price=$price, make='$make', model='$model', country='$country', description='$description', categoryId=$categoryId WHERE name='$name'";
    } else {
        $query = "INSERT INTO products (name, price, make, model, country, description, categoryId) VALUES ('$name', $price, '$make', '$model', '$country', '$description', $categoryId)";
    }

    $conn->query($query);
    $conn->close();

    header("Location: main.php");
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .main {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        button {
            width: 200px;
        }
    </style>
</head>
<body>
<form class="main" method="post">
    <div class="form-group mb-2">
        <label class="form-label">Product name</label>
        <input onchange="isValid()" type="text" class="form-control" name="name" id="name">
        <span class="text-danger" id="nameErr" style="display: none;"></span>
    </div>
    <div class="form-group mb-2">
        <label class="form-label">Product price</label>
        <input onchange="isValid()" type="text" class="form-control" name="price" id="price">
        <span class="text-danger" id="priceErr" style="display: none;"></span>
    </div>
    <div class="form-group mb-2">
        <label class="form-label">Product make</label>
        <input onchange="isValid()" type="text" class="form-control" name="make" id="make">
        <span class="text-danger" id="makeErr" style="display: none;"></span>
    </div>
    <div class="form-group mb-2">
        <label class="form-label">Product model</label>
        <input onchange="isValid()" type="text" class="form-control" name="model" id="model">
        <span class="text-danger" id="modelErr" style="display: none;"></span>
    </div>
    <div class="form-group mb-2">
        <label class="form-label">Product country</label>
        <input onchange="isValid()" type="text" class="form-control" name="country" id="country">
        <span class="text-danger" id="countryErr" style="display: none;"></span>
    </div>
    <div class="form-group mb-2">
        <label class="form-label">Product description</label>
        <input onchange="isValid()" type="text" class="form-control" name="description" id="description">
    </div>
    <div class="form-group mb-2">
        <label class="form-label">Categories</label>
        <select onchange="isValid()" required name="category" id="category">
            <option value="">Select a category</option>
            <?php
            foreach ($categories as $category) {
                echo '<option value="' . $category['Id'] . '">' . $category['Name'] . '</option>';
            }
            ?>
        </select>
    </div>

    <button class="btn btn-success" disabled id="btn">Add</button>
</form>


<script>
    function isValid() {
        let name = document.querySelector('#name').value;
        let nameErr = document.querySelector('#nameErr');
        let price = parseFloat(document.querySelector('#price').value);
        let priceErr = document.querySelector('#priceErr');
        let make = document.querySelector('#make').value;
        let makeErr = document.querySelector('#makeErr');
        let model = document.querySelector('#model').value;
        let modelErr = document.querySelector('#modelErr');
        let country = document.querySelector('#country').value;
        let countryErr = document.querySelector('#countryErr');
        let category = document.querySelector('#category').value;

        let btn = document.querySelector('#btn');

        let isValid = true;

        if (name.length === 0 || name.length > 20) {
            isValid = false;
            nameErr.style.display = 'block';
            nameErr.textContent = 'Name must contain from 1 to 20 chars';
        } else {
            nameErr.style.display = 'none';
        }

        if (price <= 0 || isNaN(price)) {
            isValid = false;
            priceErr.style.display = 'block';
            priceErr.textContent = 'Price must be more than 0';
        } else {
            priceErr.style.display = 'none';
        }

        if (make.length === 0 || make.length > 20) {
            isValid = false;
            makeErr.style.display = 'block';
            makeErr.textContent = 'Make must contain from 1 to 20 chars';
        } else {
            makeErr.style.display = 'none';
        }

        if (model.length === 0 || model.length > 20) {
            isValid = false;
            modelErr.style.display = 'block';
            modelErr.textContent = 'Model must contain from 1 to 20 chars';
        } else {
            modelErr.style.display = 'none';
        }

        if (country.length === 0 || country.length > 20) {
            isValid = false;
            countryErr.style.display = 'block';
            countryErr.textContent = 'Country must contain from 1 to 20 chars';
        } else {
            countryErr.style.display = 'none';
        }

        if (isValid) {
            btn.removeAttribute('disabled');
        } else {
            btn.setAttribute('disabled', 'true');
        }
    }

</script>
</body>
</html>

