<?php
$arr = array(4, 1, 3, 2, 8, 5, 11, 13, 6, 7);
$str = print_r($arr, true);
echo "<h1>Input array: $str</h1>";

$pair = [];
$max = $arr[0];
$min = $arr[0];
foreach ($arr as $val) {
    if ($val % 2 === 0) {
        $pair[] = $val;
    }
    if ($val > $max) {
        $max = $val;
    }
    if ($val < $min) {
        $min = $val;
    }
}

$str = print_r($pair, true);
echo "<h4>Pair: $str</h4><br/>";

echo "<h4>Max: $max; Min: $min</h4><br/>";

sort($arr);
$str = print_r($arr, true);

echo "<h4>Sorted: $str</h4><br/>";

echo "<hr/>";


$arr1 = array(4, 1, 3, 2, 8, 5, 11, 13, 6, 7);
$str = print_r($arr1, true);
echo "<h4>Arr 1: $str</h4><br/>";
$arr2 = array(4, 17, 13, 16, 33, 12, 9, 10, 0);
$str = print_r($arr2, true);
echo "<h4>Arr 2: $str</h4><br/>";

in_array($arr1, $arr2);

$res = [];

foreach ($arr1 as $val) {
    if (!in_array($val, $res)) {
        $res[] = $val;
    }
}
foreach ($arr2 as $val) {
    if (!in_array($val, $res)) {
        $res[] = $val;
    }
}
$str = print_r($res, true);
echo "<h4>Output: $str</h4><br/>";
echo "<hr/>";

$arr = array(3, 3, 1, 5, 6, 9, 7, 3, 1, 5);
$str = print_r($arr, true);
echo "<h1>Input array: $str</h1>";

$res = [];

foreach ($arr as $val) {
    if (key_exists($val, $res)) {
        $res[$val]++;
    } else {
        $res[$val] = 1;
    }
}

foreach ($res as $key => $val) {
    echo '<p style="font-size:20px"><strong>' . $key . '</strong>' . ' - ' . $val . '</p>';
}

echo '<hr/>';

$fruits = [
    ['name' => 'orange', 'type' => 'citres', 'price' => 20, 'count' => 2],
    ['name' => 'banana', 'type' => 'fruit', 'price' => 10, 'count' => 6],
    ['name' => 'lemon', 'type' => 'citres', 'price' => 10, 'count' => 7],
    ['name' => 'apple', 'type' => 'fruit', 'price' => 15, 'count' => 3],
    ['name' => 'kiwi', 'type' => 'fruit', 'price' => 5, 'count' => 1]
];

echo '<h1>All</h1>';
$sum = 0;
foreach ($fruits as $fruit) {
    echo '<div style="float:left; padding:10px; background-color:green;">
    <h2>' . $fruit['name'] . '</h2>
    <h5>Type: ' . $fruit['type'] . '</h5>
    <h5>Price: ' . $fruit['price'] . '</h5>
    <h3>Amount:' . $fruit['count'] . '</h3>
    <h6>Total price:' . $fruit['price'] * $fruit['count'] . '</h6>
    </div>';
    $sum += $fruit['price'] * $fruit['count'];
}
echo '<div style="clear:both"></div>';
echo '<h1>Citrus</h1>';

function isCitres($val)
{
    if ($val['type'] === 'citres')
        return true;
    return false;
}

foreach (array_filter($fruits, 'isCitres') as $fruit) {
    echo '<div style="float:left; padding:10px; background-color:orange;">
    <h2>' . $fruit['name'] . '</h2>
    <h5>Type: ' . $fruit['type'] . '</h5>
    <h5>Price: ' . $fruit['price'] . '</h5>
    <h3>Amount:' . $fruit['count'] . '</h3>
    <h6>Total price:' . $fruit['price'] * $fruit['count'] . '</h6>
    </div>';
}
echo '<div style="clear:both"></div>';
echo '<h1>Total sum:' . $sum . '</h1>';

echo '<hr/>';

echo '<div style="clear:both"></div>';
$countries = [
    "Україна" => "UA",
    "США" => "USA",
    "Канада" => "CA",
    "Німеччина" => "DE",
    "Франція" => "FR",
    "Італія" => "IT",
    "Японія" => "JP"
];

echo '<select name="country">';

foreach ($countries as $country => $code) {
    echo "<option value=\"$code\">$country</option>";
}

echo '</select>';

echo '<hr/>';

$resources = [
    [
        "name" => "YouTube",
        "image" => "https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/YouTube_social_white_square_%282017%29.svg/800px-YouTube_social_white_square_%282017%29.svg.png",
        "link" => "https://www.youtube.com",
        "alt" => "YouTube"
    ],
    [
        "name" => "Facebook",
        "image" => "https://z-m-static.xx.fbcdn.net/rsrc.php/v3/yD/r/5D8s-GsHJlJ.png",
        "link" => "https://www.facebook.com",
        "alt" => "Facebook"
    ],
    [
        "name" => "Google",
        "image" => "https://yt3.googleusercontent.com/viNp17XpEF-AwWwOZSj_TvgobO1CGmUUgcTtQoAG40YaYctYMoUqaRup0rTxxxfQvWw3MvhXesw=s900-c-k-c0x00ffffff-no-rj",
        "link" => "https://www.google.com",
        "alt" => "Google"
    ],
    [
        "name" => "Gmail",
        "image" => "https://cdn2.downdetector.com/static/uploads/logo/gmail_logo_hSykdMC.jpeg",
        "link" => "https://mail.google.com",
        "alt" => "Gmail"
    ]
];

echo '<div class="resource-links">';

foreach ($resources as $resource) {
    echo '<a href="' . $resource['link'] . '" target="_blank">';
    echo '<img style="width:50px; height:50px;border-radius:50%" src="' . $resource['image'] . '" alt="' . $resource['alt'] . '" title="' . $resource['name'] . '">';
    echo '</a>';
}

echo '</div>';