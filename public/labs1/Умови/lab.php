<?php
echo "<h1>EX1</h1>";
$num = 1;
echo $num % 2 == 0 ? "Парное" : "Непарное";
echo "<hr/>";

echo "<h1>EX2</h1>";
$num1 = 12;
$num2 = 10;
echo $num1 > $num2 ? $num1 : $num2;
echo "<hr/>";

echo "<h1>EX3</h1>";
echo '<form method="post" action="lab.php">
<label for="number">Введіть число:</label>
<input type="text" id="number" name="number">
<input type="submit" value="Показати">
</form>';
$number = $_POST['number'] ?? 0;
if ($number < 0)
    $number = -$number;
echo "Введене число: $number<br>";
echo "Протилежне значення:$number";
echo "<hr/>";

echo "<h1>EX4</h1>";
$A = 5;
$B = 16;
$number = 18;
if ($number > $A && $number < $B)
    echo $number * $number;
elseif ($number < $A) {
    echo "Число менше від мінімального на " . ($A - $number);
} elseif ($number > $B) {
    echo "Число більше від максимального на " . ($number - $B);
}
echo "<hr/>";

echo "<h1>EX5</h1>";
$number = 5;
if ($number < 1 && $number > 6) {
    echo "Error";
} else {
    echo "<h$number>Hello</h$number>";
}
echo "<hr/>";

echo "<h1>EX6</h1>";
$day = 15;
$month = 7;
function getSeason($month)
{
    if ($month == 12 || $month == 1 || $month == 2) {
        return "Зима";
    } elseif ($month >= 3 && $month <= 5) {
        return "Весна";
    } elseif ($month >= 6 && $month <= 8) {
        return "Літо";
    } else {
        return "Осінь";
    }
}
function getMonthName($month)
{
    $months = [
        1 => "Січень",
        2 => "Лютий",
        3 => "Березень",
        4 => "Квітень",
        5 => "Травень",
        6 => "Червень",
        7 => "Липень",
        8 => "Серпень",
        9 => "Вересень",
        10 => "Жовтень",
        11 => "Листопад",
        12 => "Грудень"
    ];
    return $months[$month];
}
function getHalfOfMonth($day)
{
    if ($day <= 15) {
        return "Перша половина місяця";
    } else {
        return "Друга половина місяця";
    }
}
$season = getSeason($month);
$monthName = getMonthName($month);
$halfOfMonth = getHalfOfMonth($day);
echo "Пора року: $season<br/>";
echo "Назва місяця: $monthName<br/>";
echo "$halfOfMonth<br/>";
echo "<hr/>";

echo "<h1>EX7</h1>";
$input_number = 1024;
$from = 'KB';
$to = 'MB';
function convertMemoryUnit($number, $from, $to)
{
    $units = [
        'B' => 1,
        'KB' => 1024,
        'MB' => 1024 * 1024,
        'GB' => 1024 * 1024 * 1024,
        'TB' => 1024 * 1024 * 1024 * 1024
    ];
    if (!isset($units[$from]) || !isset($units[$to])) {
        return "Помилка: Невірні одиниці вимірювання.";
    }
    $bytes = $number * $units[$from];
    $result = $bytes / $units[$to];
    return $result;
}
$result = convertMemoryUnit($input_number, $from, $to);
echo "$input_number $from дорівнює $result $to\n";
echo "<hr/>";
