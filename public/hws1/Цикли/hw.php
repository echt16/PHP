<?php
$n = 15;

$sum = 0;

for ($i = 0; $i < $n; $i++) {
    $num = 1 + $i * 2;
    echo '<span>' . $num . '  </span>';
    $sum += $num;
}

echo '<p>AVG: ' . ($sum / $n) . '  </p>';

for ($i = $n - 1; $i >= 0; $i--) {
    $num = 1 + $i * 2;
    echo '<span>' . $num . '  </span>';
}

echo '<hr/>';

$mirrored = 0;
$pair = 0;
$notPair = 0;
$ordered = 0;

function isPair($numStr): bool
{
    $num = intval($numStr);
    if ($num % 2 == 0) {
        return true;
    }
    return false;
}

function ordered($numStr1, $numStr2): bool
{
    $num1 = intval($numStr1);
    $num2 = intval($numStr2);
    if ($num2 === $num1 - 1) {
        return true;
    }
    return false;
}

for ($i = 1000; $i < 10000; $i++) {
    $str = strval($i);
    if ($str[0] . $str[1] === $str[3] . $str[2]) {
        $mirrored++;
    }
    if (isPair($str[0]) && isPair($str[1]) && isPair($str[2]) && isPair($str[3])) {
        $pair++;
    }
    if (!isPair($str[0]) && !isPair($str[1]) && !isPair($str[2]) && !isPair($str[3])) {
        $notPair++;
    }
    if (ordered($str[0], $str[1]) && ordered($str[1], $str[2]) && ordered($str[2], $str[3])) {
        $ordered++;
    }
}

echo "<p>Mirrored number: $mirrored</p>";
echo "<p>Pair: $pair</p>";
echo "<p>Not pair: $notPair</p>";
echo "<p>Ordered: $ordered</p>";

echo "<hr/>";

$style = '"float:left; width:50px; height:50px; border-radius:50%; background-color:blue;"';

for ($i = 0; $i < 10; $i++) {
    echo "<div style=$style></div>";
}

echo '<hr/>';

echo '<div style="clear:both;"></div>';

$binaryNumber = '10101011';
$decimalNumber = bindec($binaryNumber);
$hexadecimalNumber = dechex($decimalNumber);
echo "<p>$hexadecimalNumber</p>";

echo '<hr/>';

$num = 54;

$romanNumerals = array(
    'M' => 1000,
    'CM' => 900,
    'D' => 500,
    'CD' => 400,
    'C' => 100,
    'XC' => 90,
    'L' => 50,
    'XL' => 40,
    'X' => 10,
    'IX' => 9,
    'V' => 5,
    'IV' => 4,
    'I' => 1
);

$result = '';

foreach ($romanNumerals as $roman => $value) {
    while ($num >= $value) {
        $result .= $roman;
        $num -= $value;
    }
}

echo "<p>$result</p>";

$now = new DateTime('now');

$firstDay = (clone $now)->modify('first day of this month');
$lastDay = (clone $now)->modify('last day of this month');

echo '<div class="container"><div class="container-row container-row-start">';

for ($i = clone $firstDay; $i <= $lastDay; $i = $i->modify('+1 day')) {
    $day = $i->format('l');
    if ($day == 'Sunday' || $day == 'Saturday') {
        echo "<div class='container-row-item weekend'>{$i->format('d')}</div>";
        if ($day == 'Sunday') {
            echo '</div><div class="container-row container-row-end">';
        }
    } else {
        echo "<div class='container-row-item default'>{$i->format('d')}</div>";
    }
}

echo '</div></div>';

echo $lastDay->format('d - m - Y');









