<?php
echo "<h1>EX1</h1>";
$a = 10;
$b = 2;
if ($b != 0 && $a % $b == 0) {
    echo "$a є кратним $b";
} else {
    echo "$a не є кратним $b";
}
echo "<hr/>";

echo "<h1>EX2</h1>";
$a = 7;
$b = 5;

$max = ($a > $b) ? $a : $b;
$square = $max * $max;

echo "Квадрат більшого числа ($max) дорівнює $square";
echo "<hr/>";

echo "<h1>EX3</h1>";
$month = 2;

function getDaysInMonth($month)
{
    if ($month < 1 || $month > 12) {
        return "Невірний номер місяця";
    }

    $daysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    return $daysInMonth[$month - 1];
}

$days = getDaysInMonth($month);

echo "Кількість днів у місяці $month: $days";
echo "<hr/>";

echo "<h1>EX4</h1>";
$year = 2024;
function isLeapYear($year)
{
    if ($year % 4 == 0) {
        if ($year % 100 == 0) {
            if ($year % 400 == 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    } else {
        return false;
    }
}
if (isLeapYear($year)) {
    echo "$year є високосним роком";
} else {
    echo "$year не є високосним роком";
}
echo "<hr/>";

echo "<h1>EX5</h1>";
$a = 9;
$b = 3;
if ($a % 3 == 0 && $b % 3 == 0) {
    $sum = $a + $b;
    echo "Сума чисел $a і $b, обидва з яких кратні 3, дорівнює $sum.";
} else {
    if ($b != 0) {
        $division = $a / $b;
        echo "Результат ділення $a на $b дорівнює $division.";
    } else {
        echo "Некоректний ввід: друге число не може дорівнювати нулю.";
    }
}
echo "<hr/>";

echo "<h1>EX6</h1>";
session_start();
$session_id = 0;
if ($session_id == 0) {
    echo '<form method="post" action="login.php">
            <label for="username">Логін:</label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Пароль:</label><br>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Увійти">
          </form>';
} elseif ($session_id == 1) {
    echo 'Ви зареєстровані, увійдіть';
} else {
    echo 'Невідомий статус сесії';
}
echo "<hr/>";

echo "<h1>EX7</h1>";
$x = 100;
$y = 150;
$width = 200;
$height = 100;
$color = '#FF5733';

function isWithinBounds($x, $y, $width, $height, $screenWidth, $screenHeight)
{
    if ($x >= 0 && $y >= 0 && ($x + $width) <= $screenWidth && ($y + $height) <= $screenHeight) {
        return true;
    }
    return false;
}

$screenWidth = 1920;
$screenHeight = 1080;
if (isWithinBounds($x, $y, $width, $height, $screenWidth, $screenHeight)) {
    echo "<div style='position: absolute; left: {$x}px; top: {$y}px; width: {$width}px; height: {$height}px; background-color: $color;'></div>";
} else {
    echo "Координати або розміри виходять за межі екрану.";
}
echo "<hr/>";