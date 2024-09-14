<?php
session_start();
$isError = false;
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];


    $check = "select count(*) as count from users where login = '{$login}' and password = '{$password}'";

    $conn = new mysqli("localhost", "root", "password", "Shop");

    if ($conn->connect_error) {
        $isError = true;
        $error = $conn->connect_error;
    }

    if ((int)$conn->query($check)->fetch_assoc()['count'] > 0) {
        $_SESSION['status'] = 'authorized';
        $conn->close();
        header("Location: index.php");
    } else {
        $isError = true;
        $error = 'User not Found';
    }

    $conn->close();
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
</head>
<body>
<form method="post" class="container">
    <?php if ($isError) {
        echo '<p class="alert alert-danger"><?= $error ?></p>';
    } ?>
    <div class="form-group">
        <label class="form-label">Login</label>
        <input required type="text" class="form-control" name="login">
    </div>
    <div class="form-group">
        <label class="form-label">Password</label>
        <input required type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit">Login</button>
    </div>
    <div class="form-group">
        <a href="register.php">Register</a>
    </div>
</form>
</body>
</html>


