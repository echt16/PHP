<?php
for ($i = 0; $i < 100; $i++) {
    $arr[] = rand(0, 100);
}

print_r($arr);

$max = max($arr);
$min = min($arr);
echo '<p>Max: ' . $max . ' Min: ' . $min . '</p>';

echo '<hr/>';

$images = scandir(__DIR__);
$extensions = ['jpg', 'jpeg', 'png', 'gif'];
foreach ($images as $image) {
    $extens = pathinfo($image, PATHINFO_EXTENSION);
    if (in_array(strtolower($extens), $extensions)) {
        echo '<img style="max-width:20%; height:auto; float:left" src="' . $image . '">';
    }
}

echo '<hr/>';

$ex3 = '<table>
            <tbody>
                <tr>
                    ';

for ($i = 2; $i <= 10; $i++) {
    $ex3 .= '<td>
                <table>
                    <tbody>';
    for ($j = 1; $j <= 10; $j++) {
        $ex3 .= '<tr><td>' . $i . ' * ' . $j . ' = ' . $i * $j . '</td></tr>';
    }
    $ex3 .= '</tbody>
        </table>
    </td>';
}

$ex3 .= '</tr>
    </tbody>
</table';

echo $ex3;

$percent = 0.2;
$amount = 300;
$years = 20;

echo '<table><tr>
<th>Year</th>
<th>Sum start</th>
<th>Sum end</th>
<th>Profit</th>
</tr>';


$sumStart = $amount;
$sumEnd = $amount;

for ($i = 1; $i <= $years; $i++) {
    $sumEnd = $sumStart * (1 + $percent);
    echo '<tr>
    <td>' . $i . '</td>
    <td>' . round($sumStart, 2) . '</td>
    <td>' . round($sumEnd, 2) . '</td>
    <td>' . round($sumEnd - $sumStart, 2) . '</td>
</tr>';
    $sumStart = $sumEnd;
}

echo '</table>';

echo '<hr/>';

$number = 347689;

echo '<h1>' . $number . '</h1>';

$numberStr = strval($number);

$reversedStr = strrev($numberStr);

$reversedNumber = intval($reversedStr);

echo '<h1>' . $reversedNumber . '</h1>';

echo '<hr/>';

function analyzeNumber($number): array
{
    $numberStr = strval($number);

    $digits = str_split($numberStr);

    $digits = array_map('intval', $digits);

    $count = count($digits);

    $maxDigit = max($digits);
    $minDigit = min($digits);

    $sum = array_sum($digits);

    $average = $sum / $count;

    return [
        'count' => $count,
        'maxDigit' => $maxDigit,
        'minDigit' => $minDigit,
        'sum' => $sum,
        'average' => $average
    ];
}

$analysis = analyzeNumber($number);

echo "Количество цифр: " . $analysis['count'] . "\n";
echo "Наибольшая цифра: " . $analysis['maxDigit'] . "\n";
echo "Наименьшая цифра: " . $analysis['minDigit'] . "\n";
echo "Сумма цифр: " . $analysis['sum'] . "\n";
echo "Среднее значение цифр: " . $analysis['average'] . "\n";




