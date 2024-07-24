<?php
function example($num1, $num2, $operation): void
{
    $result = '';
    switch ($operation) {
        case '+':
            {
                $result .= "<span>$num1 + $num2 = " . $num1 + $num2 . "</span>";
            }
            break;
        case '-':
            {
                $result .= "<span>$num1 - $num2 = " . $num1 - $num2 . "</span>";
            }
            break;
        case '*':
            {
                $result .= "<span>$num1 * $num2 = " . $num1 * $num2 . "</span>";
            }
            break;
        case '/':
            {
                if ($num2 == 0) {
                    $result .= "<span>$num1 / $num2 = <span style='color: red;'>Devide by zerrro error!</span></span>";
                } else {
                    $result .= "<span>$num1 / $num2 = " . $num1 / $num2 . "</span>";
                }
            }
            break;
        default:
            {
                $result .= "<span>$num1 " . $operation . " $num2 = <span style='color: red;'>Incorrect operation error!</span></span>";
            }
            break;
    }
    echo $result;
}

function printElement($tag, $style, $content): void
{
    echo "<$tag style='$style'>$content</$tag>";
}

function printMenu($menu, $style, $hover): void
{
    $doc = new DOMDocument();
    $styles = "<style>
        .container{
            height: 80px;
            display: flex;
        }
        .container-item{
            height: 100%;
            width: 100px;
            $style;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container-item:hover{
            $hover;
        }
    </style>";
    $html = "$styles
      <div class='container' id='container'>
        
      </div>  
    ";
    $doc->loadHTML($html);
    foreach ($menu as $item) {
        $div = $doc->createElement('div');
        $div->setAttribute('class', 'container-item');
        $div->textContent = $item;
        $doc->getElementById('container')->appendChild($div);
    }
    echo $doc->saveHTML();
}

function randomColor(): string
{
    $color = '#';
    $letters = ['A', 'B', 'C', 'D', 'E', 'F'];
    for ($i = 0; $i < 6; $i++) {
        if (rand(0, 100) < 50) {
            $color .= $letters[rand(0, count($letters) - 1)];
        } else {
            $color .= rand(0, 9);
        }
    }
    return $color;
}


function printChessBoard($row, $col, $figureImgSrc): void
{
    $html = '
<style>
    table{
        border-collapse: collapse;
    }
    img{
        max-width: 100%;
        max-height: 100%;
    }
    td{
        width: 50px;
        height: 50px;
    }
    #board tr:nth-child(2n - 1) td:nth-child(2n), #board tr:nth-child(2n) td:nth-child(2n - 1){
        background-color: black;
    }
    #board tr:nth-child(2n - 1) td:nth-child(2n - 1), #board tr:nth-child(2n) td:nth-child(2n){
        background-color: white;
    }
</style>
<table>
    <tbody id="board">
    
</tbody>
</table>';
    $doc = new DOMDocument();
    $doc->loadHTML($html);

    $table = $doc->getElementById('board');
    for ($i = 0; $i < 8; $i++) {
        $tr = $doc->createElement('tr');
        for ($j = 0; $j < 8; $j++) {
            $td = $doc->createElement('td');
            if($row === $i && $col === $j) {
                $img = $doc->createElement('img');
                $img->setAttribute('src', $figureImgSrc);
                $td->appendChild($img);
            }
            $tr->appendChild($td);
        }
        $table->appendChild($tr);
    }
    echo $doc->saveHTML();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p><?php example(15, 20, '+') ?></p>
<p><?php example(12, 0, '/') ?></p>
<p><?php example(4, 6, '@') ?></p>
<hr/>
<?php printElement('p', 'color:yellow;background-color:red', 'element2'); ?>
<hr/>
<?php
$menu = ['Home', 'About', 'Contact', 'Photo', 'Blog'];
$style = 'color:yellow;background-color:green';
$hover = 'color:green; background-color:yellow';
printMenu($menu, $style, $hover);
?>
<hr/>
<div style="background-color: <?php echo randomColor() ?>; width: 50px; height: 50px"></div>
<hr/>
<?php printChessBoard(3, 3, "https://w7.pngwing.com/pngs/198/648/png-transparent-mare-arabian-horse-stallion-australian-horse-mustang-watercolor-horse-horse-mare-horse-tack.png"); ?>
</body>
</html>




















