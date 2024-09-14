<?php
$sectors = [];

$query = 'select * from sectors';

$conn = new mysqli("localhost", "root", "password", "Shop");
if(!$conn->connect_error && $result = $conn->query($query)) {
    foreach ($result as $row) {
        $sectors[] = $row;
    }
}
$conn->close();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $sectorId = (int)$_POST["sector"];

    $conn = new mysqli("localhost", "root", "password", "Shop");

    $query = "insert into categories(Name, SectorId) values ('$name', $sectorId)";

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

        button, select, option {
            width: 200px;
        }
    </style>
</head>
<body>
<form class="main" method="post">
    <div class="form-group mb-2">
        <label class="form-label">Category name</label>
        <input onchange="isValid(event)" type="text" class="form-control" name="name">
    </div>
    <div class="form-group mb-2">
        <label class="form-label">Sector</label>
        <select name="sector" required>
            <?php
                foreach ($sectors as $sector) {
                    echo '<option value="' . $sector['Id'] . '">' . $sector['Name'] . '</option>';
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
