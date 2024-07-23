<?php
onLoad();
function fMax($num1, $num2)
{
    return max($num1, $num2);
}

function fPow($num1, $num2){
    return pow($num1, $num2);
}

function fAvg($num1, $num2){
    return ($num1 + $num2) / 2;
}

$num1 = 8;
$num2 = 3;

echo "Numbers: $num1, $num2<br>
Max:".fMax($num1, $num2)."<br>
Pow:".fPow($num1, $num2)."<br>
Avg:".fAvg($num1, $num2)."<br>";

function without($haystack, $needle){
    $numStr = strval($haystack);

    $res = "";

    for($i = 0; $i < strlen($numStr); $i++){
        if($numStr[$i] != $needle){
            $res .= $numStr[$i];
        }
    }

    return $res;
}

echo '358436593 without "3" is: '.without(358436593, 3).' <br>';

function onLoad(): void
{
    $date = new DateTime();
    $hours = $date->format('H');
    $color = '';
    if($hours > 6 && $hours <= 12){
        $color = 'blue';
    }
    elseif($hours > 12 && $hours <= 16){
        $color = 'yellow';
    }
    elseif($hours > 16 && $hours <= 21){
        $color = 'red';
    }
    elseif($hours > 21 && $hours <= 24){
        $color = 'black';
    }
    elseif($hours > 0 && $hours <= 6){
        $color = 'black';
    }

    echo "
    <style>
    body{background-color: $color;};
</style>";
}

function isMultiple(int $number1, int $number2 = 2): bool
{
    if ($number2 === 0) {
        throw new InvalidArgumentException("Делитель не может быть нулем.");
    }
    return $number1 % $number2 === 0;
}

$num1 = 10;
$num2 = 5;

if (isMultiple($num1, $num2)) {
    echo "$num1 кратно $num2";
} else {
    echo "$num1 не кратно $num2";
}

echo "<br>";

if (isMultiple($num1)) {
    echo "$num1 кратно 2";
} else {
    echo "$num1 не кратно 2";
}

echo "<hr>";
function generateTable(int $rows, int $columns, string $columnWidth, string $rowHeight): void
{
    if ($rows <= 0 || $columns <= 0) {
        echo "Кількість рядків і стовпців повинна бути більше нуля.";
        return;
    }

    echo "<table border='1' style='border-collapse: collapse;'>";

    for ($i = 0; $i < $rows; $i++) {
        echo "<tr style='height: $rowHeight;'>";

        for ($j = 0; $j < $columns; $j++) {
            echo "<td style='width: $columnWidth;'>Cell $i-$j</td>";
        }

        echo "</tr>";
    }

    echo "</table>";
}

$rows = 4;
$columns = 3;
$columnWidth = '100px';
$rowHeight = '50px';

generateTable($rows, $columns, $columnWidth, $rowHeight);

echo "<hr>";

function Decrement($num1) : void
{
    echo "  $num1   ";
    $num1--;
    if($num1 > 0){
        Decrement($num1);
    }
}

Decrement(10);






