<?php

$loginError = '';
$passwordError = '';
$error = '';
$isError = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];

    $conn = new mysqli("localhost", "root", "password", "Shop");



    if ($conn->connect_error) {
        $error = $conn->connect_error;
        $isError = true;
    }

    $count = (int)$conn->query("SELECT COUNT(*) as count FROM users WHERE login = '123'")->fetch_assoc()['count'];

    if($count > 0){
        $isError = true;
        $error = 'User with this login already exists';
    }

    if(!$isError){
        $password = $_POST['password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $country = $_POST['country'];
        $city = $_POST['city'];

        $insert = "INSERT INTO users (Login, Password, Name, Surname, Country, City)
                    values ('$login', '$password', '$name', '$surname', '$country', '$city');";

        if ($conn->query($insert) === TRUE) {
            $conn->close();
            header('Location: login.php');
        }
        else{
            $isError = true;
            $error = 'Insert error';
        }
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
    <title>Document</title>
</head>
<body>
<form method="post" class="container">
    <?php if ($isError) {
        echo '<p class="alert alert-danger" id="error"><?= $error ?></p>';
    } ?>
    <div class="form-group">
        <label class="form-label">Login</label>
        <input onchange="formValidation()" id="login" required type="text" class="form-control" name="login"><span
                style="display: none;"
                class="alert alert-danger"
                id="loginError"></span>
    </div>
    <div class="form-group">
        <label class="form-label">Password</label>
        <input onchange="formValidation()" id="password" required type="password" class="form-control"
               name="password"><span
                class="alert alert-danger"
                style="display: none;"
                id="passwordError"></span>
    </div>
    <div class="form-group">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group">
        <label class="form-label">Surname</label>
        <input type="text" class="form-control" name="surname" required>
    </div>
    <div class="form-group">
        <label class="form-label">Country</label>
        <input type="text" class="form-control" name="country" required>
    </div>
    <div class="form-group">
        <label class="form-label">City</label>
        <input type="text" class="form-control" name="city" required>
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit" disabled id="submitBut">Register</button>
    </div>

    <div class="form-group">
        <a href="login.php">Login</a>
    </div>
</form>

<script>
    function formValidation() {
        let loginError = document.querySelector('#loginError');
        let login = document.querySelector('#login');
        let passwordError = document.querySelector('#passwordError');
        let password = document.querySelector('#password');

        let btn = document.querySelector('#submitBut');

        let isValid = true;

        if (login.value.length < 3 || login.value.length > 20) {
            loginError.textContent = 'Login must contain more than 3 characters and less than 20';
            loginError.style.display = 'block';
            isValid = false;
        }
        else
        {
            loginError.style.display = 'none';
        }
        if (password.value.length < 6) {
            passwordError.textContent = 'Password must contain more than 6 characters';
            passwordError.style.display = 'block';
            isValid = false;
        }
        else
        {
            passwordError.style.display = 'none';
        }

        if (isValid) {
            btn.removeAttribute('disabled');
            passwordError.style.display = 'none';
            loginError.style.display = 'none';
        } else {
            btn.setAttribute('disabled', 'true');
        }
    }
</script>
</body>
</html>
