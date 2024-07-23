<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        input.error {
            border-color: red;
        }

        span.error {
            color: red;
        }
    </style>
</head>
<body>
<?php
$html = '<form method="POST">
    <label>
        <input type="text" name="tLogin" placeholder="login" required><span class="error" id="loginError"></span>
    </label>
    <br/>
    <label>
        <input type="password" name="tPass" placeholder="password" required><span class="error" id="passError"></span>
    </label>
    <br/>
    <label>
        <input type="password" name="tConfirm" placeholder="confirm password" required><span class="error" id="conPassError"></span>
    </label>
    <br/>
    <label>
        <input type="email" name="tEmail" placeholder="email" required><span class="error" id="emailError"></span>
    </label>
    <br/>
    <label>
        <input type="text" name="tPhone" placeholder="phone" required><span class="error" id="phoneError"></span>
    </label>
    <br/>
    <button type="submit">Register</button>
</form>';
$doc = new DOMDocument();
$doc->loadHTML($html);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["tLogin"];
    $pass = $_POST["tPass"];
    $conPass = $_POST["tConfirm"];
    $email = $_POST["tEmail"];
    $phone = $_POST["tPhone"];

    $loginError = $doc->getElementById("loginError");
    $passError = $doc->getElementById("passError");
    $conPassError = $doc->getElementById("conPassError");
    $emailError = $doc->getElementById("emailError");
    $phoneError = $doc->getElementById("phoneError");

    if ($login === '123') {
        $loginError->parentElement->firstElementChild->setAttribute('class', "error");
        $loginError->parentElement->firstElementChild->setAttribute('value', $login);
        $loginError->textContent = 'User with this login already exists';
    }
    if (strlen($pass) < 8) {
        $passError->parentElement->firstElementChild->setAttribute('class', "error");
        $passError->parentElement->firstElementChild->setAttribute('value', $pass);
        $passError->textContent = 'Password must be at least 8 characters';
    }
    if ($pass !== $conPass) {
        $conPassError->parentElement->firstElementChild->setAttribute('class', "error");
        $conPassError->parentElement->firstElementChild->setAttribute('value', $conPass);
        $conPassError->textContent = 'Password do not match';
    }
    if (@filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError->parentElement->firstElementChild->setAttribute('class', "error");
        $emailError->parentElement->firstElementChild->setAttribute('value', $email);
        $emailError->textContent = 'Please enter a valid email address';
    }
    $pattern = '/^\+?[1-9]\d{1,14}$/';
    if (@preg_match($pattern, $phone)) {
        $phoneError->parentElement->firstElementChild->setAttribute('class', "error");
        $phoneError->parentElement->firstElementChild->setAttribute('value', $phone);
        $phoneError->textContent = 'Phone number is invalid';
    }
    $html = $doc->saveHTML();
}
echo $html;
?>

</body>
</html>