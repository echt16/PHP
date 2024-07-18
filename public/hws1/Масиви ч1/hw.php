<?php
$arr = array(5, 6, 1, 2, 7, 9, 3, 2, 4, 5);
$str = print_r($arr, true);
echo "<h1>Input array: $str</h1>";

$moreThanPrev = [];
$notPair = [];

$sum = 0;
$prev = 100000;
foreach ($arr as $val) {
    if ($val > $prev) {
        $moreThanPrev[] = $val;
    }
    if ($val % 2 !== 0) {
        $notPair[] = $val;
    }
    $prev = $val;
    $sum += $val;
}
$avg = $sum / count($arr);


$str = print_r($moreThanPrev, true);
echo "<h4>Elements more than prev: $str</h4><br/>";

echo "<h4>Sum: $sum; Avg: $avg</h4><br/>";

sort($notPair);
$str = print_r($notPair, true);

echo "<h4>Sorted not pair elements$str</h4><br/>";

echo "<hr/>";

$dates = array(new DateTime('2018-12-31'), new DateTime('2019-01-16'), new DateTime('2019-02-20'), new DateTime('2019-02-21'), new DateTime('2019-03-08'));
$ex2 = '';

for ($i = 0; $i < count($dates); $i++) {
    if ($i == 0)
        continue;
    $ex2 .= $dates[$i]->format('d-m-Y') . '  -  ' . $dates[$i - 1]->format('d-m-Y') . '  -  ' . $dates[$i]->diff($dates[$i - 1])->format('%a days') . '<br/>';
}

echo $ex2;

echo '<hr/>';

$inputs = array(
    ['type' => 'text', 'value' => 'Text1'],
    ['type' => 'radio', 'value' => 'Radio1'],
    ['type' => 'checkbox', 'value' => 'Checkbox1'],
    ['type' => 'button', 'value' => 'button1'],
    ['type' => 'text', 'value' => 'Text1'],
    ['type' => 'text', 'value' => 'Text3'],
    ['type' => 'radio', 'value' => 'Radio2'],
    ['type' => 'radio', 'value' => 'Radio3'],
    ['type' => 'checkbox', 'value' => 'Checkbox2'],
    ['type' => 'button', 'value' => 'Button2']
);

$ex3 = '';

foreach ($inputs as $input) {
    $ex3 .= '<input type="' . $input["type"] . '" value="' . $input['value'] . '" style="display:block"/>';
}

echo $ex3;

echo '<hr/>';

$figures = array(
    ['type' => 'ellipse', 'color' => 'red', 'top' => 12, 'left' => 30, 'width' => '50px', 'height' => '100px'],
    ['type' => 'rectangle', 'color' => 'blue', 'top' => 30, 'left' => 30, 'width' => '100px', 'height' => '20px'],
    ['type' => 'ellipse', 'color' => 'gray', 'top' => 50, 'left' => 100, 'width' => '50px', 'height' => '50px']
);

foreach ($figures as $figure) {
    $br = '0%';
    if ($figure['type'] == 'ellipse') {
        $br = '50%';
    }
    echo '<div style="width:' . $figure['width'] . ';background-color:' . $figure['color'] . ';height:' . $figure['height'] . ';position:absolute;top:' . $figure['top'] . ';left:' . $figure['left'] . ';border-radius:' . $br . '"></div>';
}

$processors = [
    ['name' => 'Intel Core i5-9600K', 'socket' => 'LGA1151', 'frequency' => '3.7 GHz', 'cores' => 6],
    ['name' => 'AMD Ryzen 5 3600', 'socket' => 'AM4', 'frequency' => '3.6 GHz', 'cores' => 6],
];

$motherboards = [
    ['name' => 'ASUS ROG Strix Z390-E', 'socket' => 'LGA1151', 'memoryType' => 'DDR4'],
    ['name' => 'MSI B450 TOMAHAWK', 'socket' => 'AM4', 'memoryType' => 'DDR4'],
];

$memory = [
    ['name' => 'Corsair Vengeance LPX', 'memoryType' => 'DDR4', 'capacity' => '16GB'],
    ['name' => 'G.SKILL Ripjaws V', 'memoryType' => 'DDR4', 'capacity' => '16GB'],
];

$hardDrives = [
    ['name' => 'Seagate BarraCuda', 'type' => 'HDD', 'capacity' => '1TB'],
    ['name' => 'Samsung 970 EVO', 'type' => 'SSD', 'capacity' => '500GB'],
];

$powerSupplies = [
    ['name' => 'Corsair RM650x', 'power' => '650W'],
    ['name' => 'EVGA SuperNOVA 750 G3', 'power' => '750W'],
];

function generatePCCombinations($processors, $motherboards, $memory, $hardDrives, $powerSupplies)
{
    $combinations = [];

    foreach ($processors as $processor) {
        foreach ($motherboards as $motherboard) {
            if ($processor['socket'] == $motherboard['socket']) {
                foreach ($memory as $ram) {
                    if ($motherboard['memoryType'] == $ram['memoryType']) {
                        foreach ($hardDrives as $hardDrive) {
                            foreach ($powerSupplies as $powerSupply) {
                                $combinations[] = [
                                    'processor' => $processor,
                                    'motherboard' => $motherboard,
                                    'memory' => $ram,
                                    'hardDrive' => $hardDrive,
                                    'powerSupply' => $powerSupply,
                                ];
                            }
                        }
                    }
                }
            }
        }
    }

    return $combinations;
}

$pcCombinations = generatePCCombinations($processors, $motherboards, $memory, $hardDrives, $powerSupplies);

foreach ($pcCombinations as $index => $pc) {
    echo ($index + 1) . ":<br/>";
    echo "Процесор: " . $pc['processor']['name'] . " (" . $pc['processor']['frequency'] . ", " . $pc['processor']['cores'] . " ядер)<br/>";
    echo "Материнська плата: " . $pc['motherboard']['name'] . " (Сокет: " . $pc['motherboard']['socket'] . ", Тип пам’яті: " . $pc['motherboard']['memoryType'] . ")<br/>";
    echo "Оперативна пам’ять: " . $pc['memory']['name'] . " (" . $pc['memory']['capacity'] . ")<br/>";
    echo "Жорсткий диск: " . $pc['hardDrive']['name'] . " (" . $pc['hardDrive']['type'] . ", " . $pc['hardDrive']['capacity'] . ")<br/>";
    echo "Блок живлення: " . $pc['powerSupply']['name'] . " (" . $pc['powerSupply']['power'] . ")<br/>";
    echo "\n";
}

echo '<hr/>';

$sections = [
    'header' => ['height' => '100px', 'backgroundColor' => '#4CAF50', 'textColor' => '#FFFFFF'],
    'content' => ['height' => '500px', 'backgroundColor' => '#FFFFFF', 'textColor' => '#000000'],
    'footer' => ['height' => '100px', 'backgroundColor' => '#4CAF50', 'textColor' => '#FFFFFF']
];

function renderSection($id, $properties)
{
    echo "<div id='$id' style='height: {$properties['height']}; background-color: {$properties['backgroundColor']}; color: {$properties['textColor']}'>";
    echo ucfirst($id);
    echo "</div>";
}

foreach ($sections as $id => $properties) {
    renderSection($id, $properties);
}