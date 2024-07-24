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

<?php
$html = '
<form method="post">
    <label>
        <input type="email" name="ex1Email">
    </label><br>
    <label>
        <input type="checkbox" name="ex1IsSubscribe">
        Subscribe
    </label><br>
    <button type="submit">Send</button>
</form>
';
    if (isset($_POST['ex1Email']) && isset($_POST['ex1IsSubscribe'])) {
        if($_POST['ex1IsSubscribe'] == "on") {
            $html = "Thank you!";
        }
    }
    echo $html;
?>
</body>
</html>