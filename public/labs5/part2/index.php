<?php
session_start();

function array_sort($array, $on, $order = SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

$isButtonEnabled = false;
$isExistsUser = false;
$showMessages = false;
$messagesString = '';
if (isset($_SESSION['user'])) {
    $isButtonEnabled = true;
}

if (isset($_POST['send'])) {
    $xml = simplexml_load_file("Users.xml");
    $userName = $_SESSION['user'];
    $message = $_POST['message'];
    foreach ($xml as $user) {
        if ($user->attributes()['name'] == $userName) {
            if (isset($user->messages)) {
                $message = $user->messages->addChild('message', $message);
                $message->addAttribute('date', (new DateTime())->format('Y-m-d:H:i'));
            } else {
                $messages = $user->addChild('messages');
                $message = $messages->addChild('message', $message);
                $message->addAttribute('date', (new DateTime())->format('Y-m-d:H:i'));
            }
            break;
        }
    }
    $xml->saveXML('Users.xml');
} elseif (isset($_POST['refresh'])) {
    $showMessages = true;
    $xml = simplexml_load_file("Users.xml");
    $messages = [];

    foreach ($xml->user as $user) {
        $name = (string)$user->attributes()['name'];
        if (isset($user->messages)) {
            foreach ($user->messages->message as $message) {
                $date = DateTimeImmutable::createFromFormat('Y-m-d:H:i', (string)$message->attributes()['date']);
                if ($date === false) {
                    $errors = DateTimeImmutable::getLastErrors();
                    echo "Ungültiges Datumsformat! Fehler: ";
                    print_r($errors);
                } else {
                    $messages[] = ['name' => $name, 'message' => (string)$message, 'date' => $date];
                }
            }
        }
    }

    usort($messages, function($a, $b) {
        return $a['date'] <=> $b['date'];
    });
    foreach ($messages as $message) {
        $messagesString .= "<div style='padding: 5px 10px; background-color: lightgrey; border-radius: 5px; display: flex; flex-direction: column;'>
        <div style='align-self: flex-start; font-size: 15px; margin: 15px;'>{$message['date']->format('H:i')} von {$message['name']}:</div>
        <div style='align-self: center; font-size: 20px'>{$message['message']}</div>
        </div><br>";
    }
}
elseif (isset($_POST['login'])) {
    $xml = simplexml_load_file("Users.xml");
    $enteredLogin = $_POST["name"];
    $enteredPass = $_POST["password"];
    $b = false;
    foreach ($xml as $user) {
        if ($user->attributes()['name'] == $enteredLogin && $user->password == $enteredPass) {
            $b = true;
            break;
        }
    }
    if (!$b) {
        echo "Wrong username or password";
    } else {
        $isButtonEnabled = true;
        $_SESSION['user'] = $enteredLogin;
    }
} elseif (isset($_POST['register'])) {
    $xml = simplexml_load_file("Users.xml");
    $enteredLogin = $_POST["name"];
    $enteredPass = $_POST["password"];
    foreach ($xml as $user) {
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
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

<?php if ($showMessages) {
    echo $messagesString;
}
?>
</body>
</html>
