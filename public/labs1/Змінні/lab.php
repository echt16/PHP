<?php
echo "<h1>EX1</h1>";
echo "Hello World";
echo "<hr/>";

echo "<h1>EX2</h1>";
echo "a) Hello<br/>World<br/>";
echo "b) Hello<br/><pre>    World</pre><br/>";
echo "c)\"Hello World. \\\"It’s my page!\"\\\"<br/>";
echo "d)&lth1&gtHello&lt/h1&gt &lth3&gt World&lt/h3&gt &ltb&gtI&lt/b&gt &lti&gt am&lt/i&gt &ltu&gtnew PHP developer&lt/u&gt<br/>";
echo "e)&ltscript&gtalert('Hello World');&lt/script&gt<br/>";
echo "<hr/>";

echo "<h1>EX3</h1>";
echo '<form method="post" action="lab.php">
<label for="number">Введіть число:</label>
<input type="text" id="number" name="number">
<input type="submit" value="Показати">
</form>';
$number = $_POST['number'] ?? 0;
$oppositeNumber = -$number;
echo "Введене число: " . $number . "<br>";
echo "Протилежне значення: " . $oppositeNumber;
echo "<hr/>";

echo "<h1>EX4</h1>";
$num1 = 3;
$num2 = 10;
echo `$num1 + $num2 = ` . ($num1 + $num2) . '<br/>';
echo `$num1 - $num2 = ` . ($num1 - $num2) . '<br/>';
echo `$num1 * $num2 = ` . ($num1 * $num2) . '<br/>';
echo `$num1 / $num2 = ` . ($num1 / $num2) . '<br/>';
echo `$num1 % $num2 = ` . ($num1 % $num2) . '<br/>';
echo "<hr/>";

echo "<h1>EX5</h1>";
$num1 = 10;
$num2 = 3;
echo `$num1 + $num2 = ` . ($num1 + $num2) . '<br/>';
echo `$num1 - $num2 = ` . ($num1 - $num2) . '<br/>';
echo `$num1 * $num2 = ` . ($num1 * $num2) . '<br/>';
echo `$num1 % $num2 = ` . ($num1 % $num2) . '<br/>';
echo "<hr/>";

echo "<h1>EX6</h1>";
$username = "user";
$password = "pass";
echo '<form action="lab.php" method="post">
<label>Username:</label>
<input type="text" value=' . $username . ' name="username" placeholder="username">
<label>Password</label>
<input type="password" value=' . $password . ' name="password" placeholder="password">
</form>';
echo "<hr/>";

echo "<h1>EX7</h1>";
$styles = array('font-family' => 'Arial', 'font-size' => '60px', 'font-style' => 'italic');
$style = "";
foreach ($styles as $key => $value) {
    $style .= $key . ":" . $value . ";";
}
echo '<p style="' . $style . '">Hello</p>';