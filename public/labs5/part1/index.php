








<?php
$date = (new DateTime())->format('d/m/Y');
$name = $_POST['name'] ?? '';
$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';
if (isset($_POST["saveTxtDocument"])) {
    $text = "$date; $name; $login:$password;";
    saveTxtDocument($text);
} elseif (isset($_POST["saveXmlDocument"])) {
    saveXmlDocument($date, $name, $login, $password);
} elseif (isset($_POST["showResult"])) {
    header('Location: result.php');
}

function saveTxtDocument($text)
{
    $fa = fopen('accounts.txt', 'a');
    fwrite($fa, $text);
    fclose($fa);
}

function saveXmlDocument($date, $name, $login, $password)
{
    if(file_exists('accounts.xml')) {
        $xml = simplexml_load_file('accounts.xml');
    }
    else{
        $xml = new SimpleXMLElement('<users></users>');
    }
    $user = $xml->addChild('user');
    $user->addChild('date', $date);
    $user->addChild('name', $name);
    $user->addChild('login', $login);
    $user->addChild('password', $password);
    $xml->asXML('accounts.xml');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"></head>
<body>
<form class="container mt-5" method="post">
    <div class="form-group mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group mb-3">
        <label for="login" class="form-label">Login</label>
        <input type="text" name="login" class="form-control" required>
    </div>
    <div class="form-group mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="d-flex justify-content-between mb-3">
        <button type="submit" name="saveTxtDocument" class="btn btn-primary">Save as txt</button>
        <button type="submit" name="saveXmlDocument" class="btn btn-secondary">Save as xml</button>
    </div>
</form>

<form method="post">
    <button type="submit" name="showResult" class="btn btn-success">Show result</button>
</form>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>
</html>

