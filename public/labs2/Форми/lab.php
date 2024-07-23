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
<form method="post">
    <label>
        <input type="text" name="ex1"/>
    </label>
    <button type="submit">Send</button>
</form>
<?php
if (array_key_exists("ex1", $_POST)) {
    $ex1 = $_POST['ex1'];
    echo "<p>$ex1</p>";
}
?>
<hr/>

<form method="post">
    <label>
        <input type="text" name="ex2"/>
    </label>
    <button type="submit">Send</button>
</form>

<?php
if (array_key_exists("ex2", $_POST)) {
    $countries = array(
        "United States",
        "Canada",
        "United Kingdom",
        "Germany",
        "France",
        "Italy",
        "Spain",
        "China",
        "Japan",
        "Australia",
        "Brazil",
        "Mexico",
        "India",
        "Russia",
        "South Africa",
        "Argentina",
        "South Korea",
        "Turkey",
        "Netherlands",
        "Sweden",
        "Switzerland",
        "Belgium",
        "Austria",
        "Norway",
        "Denmark",
        "Finland",
        "Ireland",
        "New Zealand",
        "Portugal",
        "Greece",
        "Thailand",
        "Malaysia",
        "Singapore",
        "Philippines",
        "Indonesia",
        "Vietnam",
        "United Arab Emirates",
        "Saudi Arabia",
        "Israel",
        "Egypt",
        "Morocco",
        "Chile",
        "Peru",
        "Colombia",
        "Poland",
        "Czech Republic",
        "Hungary",
        "Romania",
        "Ukraine",
        "Nigeria"
    );

    $ex2 = $_POST['ex2'];
    $lowerEx2 = strtolower($ex2);

    $arr = array_filter($countries, function ($country) use ($lowerEx2) {
        return str_contains(strtolower($country), $lowerEx2);
    });

    echo "<ul>";
    foreach ($arr as $country) {
        $lowerCountry = strtolower($country);
        $startSub = strpos($lowerCountry, $lowerEx2);
        $endSub = $startSub + strlen($lowerEx2);

        $before = substr($country, 0, $startSub);
        $highlight = substr($country, $startSub, strlen($ex2));
        $after = substr($country, $endSub);

        echo "<li>{$before}<span style='color: red;'>{$highlight}</span>{$after}</li>";
    }
    echo "</ul>";
}
?>

<hr/>

<form method="post">
    <label>
        <input type="text" name="loginEx3">
    </label>
    <label>
        <input type="password" name="passwordEx3">
    </label>
    <button type="submit">Login</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["loginEx3"]) && isset($_POST["passwordEx3"])) {

    $login = '123';
    $password = '123';

    $loginEx3 = trim($_POST["loginEx3"]);
    $passwordEx3 = trim($_POST["passwordEx3"]);

    if ($loginEx3 === $login && $passwordEx3 === $password) {
        header("Location: success.php");
        exit();
    } else {
        echo '<a href="register.php">Register</a>';
    }
}
?>
</body>
</html>









