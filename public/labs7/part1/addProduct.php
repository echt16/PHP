<?php
$categories = [];

$conn = mysqli_connect("localhost", "root", "password", "Shop");
$query = "SELECT * FROM categories";

if($result = $conn->query($query)){
    foreach($result as $row){
        $categories[] = $row;
    }
}

$conn->close();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $categoryId = (int)$_POST["category"];
    $query = "INSERT INTO products (name, categoryId) VALUES ('$name', $categoryId)";
    $conn = new mysqli("localhost", "root", "password", "Shop");
        $conn->query($query);
    $conn->close();

    header("Location: index.php");
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
        <input onchange="isValid(event)" type="text" class="form-control" name="name">
    </div>
    <div class="form-group mb-2">
        <label class="form-label">Categories</label>
        <select required name="category">
            <?php
                foreach($categories as $category){
                    echo '<option value="'.$category['Id'].'">'.$category['Name'].'</option>';
                }
            ?>
        </select>
    </div>

    <button class="btn btn-success" disabled id="btn">Add</button>
</form>

<script>
    function isValid(event){
        let btn = document.querySelector('#btn');
        if(event.target.value.length > 0){
            btn.removeAttribute('disabled');
        }
        else{
            btn.setAttribute('disabled', 'true');
        }
    }
</script>
</body>
</html>
