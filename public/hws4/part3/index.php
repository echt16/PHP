<?php
require_once "User.php";

use part3\User;

$users = [
    new User("John Doe", "john@doe.com"),
    new User("Jane Doe", "jane@doe.com"),
    new User("Jane Doe", "jane@doe.com"),
    new User("Jane Doe", "jane@doe.com"),
    new User("Jane Doe", "jane@doe.com")
];
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php foreach ($users as $user): ?>
        <a href="cartphp.php"><?= $user->getUser() ?></a><br/>
    <?php endforeach; ?>
</body>
</html>


















