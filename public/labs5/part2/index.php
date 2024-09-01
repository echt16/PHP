<?php
session_start();
$isButtonEnabled = false;
$isExistsUser = false;
if(isset($_SESSION['user'])){
    $isButtonEnabled = true;
}

if(isset($_POST['send'])){
    $xml = simplexml_load_file("Users.xml");
    $userName = $_SESSION['user'];
    $message = $_POST['message'];
    foreach($xml as $user) {
        if ($user->attributes()['name'] == $userName) {
            if(isset($user->messages)){
                $message = $user->messages->addChild('message', $message);
                $message->addAttribute('date', (new DateTime())->format('Y-m-d'));
            }
            else{
                $messages = $user->addChild('messages');
                $message = $messages->addChild('message', $message);
                $message->addAttribute('date', (new DateTime())->format('Y-m-d'));
            }
            break;
        }
    }
    $xml->saveXML('Users.xml');
}
elseif(isset($_POST['login'])){
    $xml = simplexml_load_file("Users.xml");
    $enteredLogin = $_POST["name"];
    $enteredPass = $_POST["password"];
    $b = false;
    foreach($xml as $user) {
        if ($user->attributes()['name'] == $enteredLogin && $user->password == $enteredPass) {
            $b = true;
            break;
        }
    }
    if(!$b){
        echo "Wrong username or password";
    }
    else{
        $isButtonEnabled = true;
        $_SESSION['user'] = $enteredLogin;
    }
}
elseif(isset($_POST['register'])){
    $xml = simplexml_load_file("Users.xml");
    $enteredLogin = $_POST["name"];
    $enteredPass = $_POST["password"];
    foreach($xml as $user) {
        if ($user->attributes()['name'] == $enteredLogin) {
            $isExistsUser = true;
            break;
        }
    }
    if (!$isExistsUser) {
        $user = $xml->addChild("user");
        $user->addAttribute("name", $enteredLogin);
        $user->addChild("password", $enteredPass);
    }
    $xml->saveXML('Users.xml');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
</head>
<body>
<?php if ($isExistsUser): ?>
    <p class="alert">This login already exists!</p>
<?php endif; ?>
<form method="post" class="container">
    <div class="form-group">
        <label class="form-label">Message</label>
        <input type="text" class="form-control" name="message" required>
    </div>
    <div style="display: flex; justify-content: space-between">
        <?php if ($isButtonEnabled): ?>
            <button class="btn btn-success" name="send">Send</button>
        <?php else: ?>
            <button class="btn btn-success" name="send" disabled>Send</button>
        <?php endif; ?>
        <button class="btn btn-success" name="refresh">Refresh</button>
    </div>
</form>
<form method="post" class="container">
    <div class="form-group">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <div style="display: flex; justify-content: space-between">
        <button class="btn btn-success" name="login">Login</button>
        <button class="btn btn-success" name="register">Register</button>
    </div>
</form>
</body>
</html>
