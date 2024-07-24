<?php
session_start();
$score = isset($_SESSION['score']) ? $_SESSION['score'] : 0;
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Результат тесту</title>
</head>
<body>
<h1>Ваш результат: <?php echo $score; ?> балів</h1>
<form method="post" action="restart.php">
    <button type="submit">Розпочати тест заново</button>
</form>
</body>
</html>
