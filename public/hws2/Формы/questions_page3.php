<?php
session_start();

$questions = [
    'Питання 21?' => 'Answer1',
    'Питання 22?' => 'Answer2',
    'Питання 23?' => 'Answer3',
    'Питання 24?' => 'Answer4',
    'Питання 25?' => 'Answer5',
    'Питання 26?' => 'Answer6',
    'Питання 27?' => 'Answer7',
    'Питання 28?' => 'Answer8',
    'Питання 29?' => 'Answer9',
    'Питання 30?' => 'Answer10'
];

$keys = array_keys($questions);
shuffle($keys);
$_SESSION['questions_page3'] = $keys;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answers = $_POST['answers'];
    $score = 0;

    foreach ($answers as $key => $answer) {
        if (isset($questions[$key]) && strcasecmp($answer, $questions[$key]) == 0) {
            $score += 5;
        }
    }

    $_SESSION['score'] += $score;
    header('Location: summary.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Тестова форма - Сторінка 3</title>
    <script>
        function validateForm() {
            const form = document.querySelector('form');
            const inputs = form.querySelectorAll('input[type="text"]');
            let allAnswered = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    allAnswered = false;
                }
            });

            if (!allAnswered) {
                alert('Будь ласка, відповідайте на всі запитання перед завершенням тесту.');
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
<h1>Сторінка 3: Відповідайте на питання словом</h1>
<form method="POST" action="questions_page3.php" onsubmit="return validateForm()">
    <?php foreach ($keys as $key): ?>
        <div>
            <label><?php echo $key; ?></label>
            <input type="text" name="answers[<?php echo $key; ?>]">
        </div>
    <?php endforeach; ?>
    <button type="submit">Finish</button>
</form>
</body>
</html>
