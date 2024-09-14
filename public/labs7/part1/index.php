<?php

session_start();

$conn = new mysqli("localhost", "root", "password", "Shop");

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$usersTable = "
CREATE TABLE Users (
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Login VARCHAR(20) NOT NULL CHECK (CHAR_LENGTH(Login) > 3 AND CHAR_LENGTH(Login) < 20),
    Password VARCHAR(20) NOT NULL CHECK (CHAR_LENGTH(Password) > 6),
    Name VARCHAR(50) NOT NULL CHECK (Name != ''),
    Surname VARCHAR(50) NOT NULL CHECK (Surname != ''),
    Country VARCHAR(50) NOT NULL CHECK (Country != ''),
    City VARCHAR(50) NOT NULL CHECK (City != '')
);";

//if ($conn->query($usersTable) === TRUE) {
//    echo "Таблица Users успешно создана<br>";
//} else {
//    echo "Ошибка при создании таблицы Users: " . $conn->error . "<br>";
//}

$sectorsTable = "
CREATE TABLE sectors (
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(50) NOT NULL CHECK (Name != '')
);";

//if ($conn->query($sectorsTable) === TRUE) {
//    echo "Таблица sectors успешно создана<br>";
//} else {
//    echo "Ошибка при создании таблицы sectors: " . $conn->error . "<br>";
//}

$categoriesTable = "
CREATE TABLE Categories (
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(50) NOT NULL CHECK (Name != ''),
    sectorId INT NOT NULL,
    CONSTRAINT sector_FK FOREIGN KEY (sectorId) REFERENCES sectors(Id)
);";

//if ($conn->query($categoriesTable) === TRUE) {
//    echo "Таблица Categories успешно создана<br>";
//} else {
//    echo "Ошибка при создании таблицы Categories: " . $conn->error . "<br>";
//}

$productsTable = "
CREATE TABLE Products (
    Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(50) NOT NULL CHECK (Name != ''),
    CategoryId INT NOT NULL,
    CONSTRAINT category_FK FOREIGN KEY (CategoryId) REFERENCES Categories(Id)
);";

//if ($conn->query($productsTable) === TRUE) {
//    echo "Таблица Products успешно создана<br>";
//} else {
//    echo "Ошибка при создании таблицы Products: " . $conn->error . "<br>";
//}

$conn->close();

if ($_SESSION['status'] != 'authorized') {
    header("Location: register.php");
}

$isCategoriesEnabled = false;
$isProductsEnabled = false;

$conn = new mysqli("localhost", "root", "password", "Shop");

if($result = $conn->query("select count(*) as count from sectors")) {
    if($result->fetch_assoc()['count'] > 0) {
        $isCategoriesEnabled = true;
    }
}

if($result = $conn->query("select count(*) as count from categories")) {
    if($result->fetch_assoc()['count'] > 0) {
        $isProductsEnabled = true;
    }
}

$conn->close();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['addSector'])) {
        header('Location: addSector.php');
    }
    else if(isset($_POST['addCategory'])) {
        header('Location: addCategory.php');
    }
    else if(isset($_POST['addProduct'])) {
        header('Location: addProduct.php');
    }
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
        .main{
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        button{
            width: 200px;
        }
    </style>
</head>
<body>
    <form class="main" method="post">
        <button class="btn btn-success mb-2" name="addSector">
            Add Sector
        </button>

        <?php
            if ($isCategoriesEnabled) {
                echo '<button class="btn btn-success mb-2" name="addCategory">Add Category</button>';
            }
            else {
                echo '<button disabled class="btn btn-success mb-2" name="addCategory">Add Category</button>';
            }
            if ($isProductsEnabled) {
                echo '<button class="btn btn-success mb-2" name="addProduct">Add Product</button>';
            }
            else {
                echo '<button disabled class="btn btn-success mb-2" name="addProduct">Add Product</button>';
            }
        ?>
    </form>
</body>
</html>
