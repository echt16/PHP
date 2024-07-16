<?php
echo "<h1>EX1</h1>";
$name = "John";
echo "Hello! My name is '$name'.";
echo "<hr/>";

echo "<h1>EX2</h1>";
$name = "John";
$age = 20;
echo "Hello! My name is '$name'.<br>";
echo "I’m $age.";
echo "<hr/>";

echo "<h1>EX3</h1>";
$a = 5;
$b = 10;
$rez = $a + $b;
echo "'$a' + '$b' = '$rez'";
echo "<hr/>";

echo "<h1>EX4</h1>";
$a = 5;
$b = 10;
$a = $a + $b;
$b = $a - $b;
$a = $a - $b;
echo "a = $a, b = $b";
echo "<hr/>";

echo "<h1>EX5</h1>";
echo '<form>
        <p>1. What is the capital of France?</p>
        <input type="radio" name="q1" value="Paris"> Paris<br>
        <input type="radio" name="q1" value="London"> London<br>
        <input type="radio" name="q1" value="Berlin"> Berlin<br>
        <input type="radio" name="q1" value="Rome"> Rome<br>

        <p>2. Which of the following are programming languages?</p>
        <input type="checkbox" name="q2[]" value="PHP"> PHP<br>
        <input type="checkbox" name="q2[]" value="HTML"> HTML<br>
        <input type="checkbox" name="q2[]" value="CSS"> CSS<br>
        <input type="checkbox" name="q2[]" value="JavaScript"> JavaScript<br>

        <p>3. Describe your experience with web development:</p>
        <textarea name="q3" rows="5" cols="40"></textarea><br>

        <input type="submit" value="Submit">
    </form>';
echo "<hr/>";

echo "<h1>EX6</h1>";
$tag = 'div';
$background_color = '#f0f0f0';
$color = '#333';
$width = '300px';
$height = '150px';
$style = "background-color: $background_color; color: $color; width: $width; height: $height;";
echo "<$tag style=\"$style\">This is a styled $tag element.</$tag>";
echo "<hr/>";
