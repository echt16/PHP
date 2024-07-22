<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Календар</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
        }

        .container-row {
            display: flex;
        }

        .container-row-item {
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            width: 30px;
            height: 30px;
            margin: 2px;
            box-sizing: border-box;
            cursor: pointer;
        }

        .default {
            color: black;
        }

        .weekend {
            color: red;
        }

        .default:hover {
            color: white;
            background-color: black;
        }

        .weekend:hover {
            color: white;
            background-color: red;
        }
    </style>
</head>
<body>
<?php
$now = new DateTime('now');

$firstDay = (clone $now)->modify('first day of this month');
$lastDay = (clone $now)->modify('last day of this month');

$startDayOfWeek = (clone $firstDay)->format('w') - 1;

echo '
<div class="container">';


echo '
    <div class="container-row">';

if ($startDayOfWeek != 0) {
    for ($j = 0; $j < $startDayOfWeek; $j++) {
        echo "
        <div class='container-row-item'></div>
        ";
    }
    $startDayOfWeek = 0;
}

for ($i = clone $firstDay; $i <= $lastDay; $i->modify('+1 day')) {


    $day = $i->format('l');
    $dayClass = ($day == 'Sunday' || $day == 'Saturday') ? 'weekend' : 'default';

    echo "
        <div class='container-row-item $dayClass'>{$i->format('d')}</div>
        ";

    if ($i->format('l') == 'Sunday') {
        echo '
    </div>
    <div class="container-row">';
    }
}

echo '
    </div>
</div>
';
?>
</body>
</html>
