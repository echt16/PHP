<?php
session_start();
$_SESSION['score'] = 0;

$questions = [
    'Питання 1?' => ['A', 'B', 'C', 'D'],
    'Питання 2?' => ['A', 'B', 'C', 'D'],
    'Питання 3?' => ['A', 'B', 'C', 'D'],
    'Питання 4?' => ['A', 'B', 'C', 'D'],
    'Питання 5?' => ['A', 'B', 'C', 'D'],
    'Питання 6?' => ['A', 'B', 'C', 'D'],
    'Питання 7?' => ['A', 'B', 'C', 'D'],
    'Питання 8?' => ['A', 'B', 'C', 'D'],
    'Питання 9?' => ['A', 'B', 'C', 'D'],
    'Питання 10?' => ['A', 'B', 'C', 'D']
];
$correct_answers = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];

$keys = array_keys($questions);
shuffle($keys);

$_SESSION['questions_page1'] = $keys;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answers = $_POST['answers'];
    $score = 0;

    foreach ($answers as $key => $answer) {
        if ($answer == $correct_answers[$key]) {
            $score++;
        }
    }

    $_SESSION['score'] += $score;
    header('Location: questions_page2.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Тестова форма - Сторінка 1</title>
    <script>
        function validateForm() {
            const form = document.querySelector('form');
            const questions = form.querySelectorAll('div');
            let allAnswered = true;

            questions.forEach(question => {
                const radios = question.querySelectorAll('input[type="radio"]');
                let answered = false;
                radios.forEach(radio => {
                    if (radio.checked) {
                        answered = true;
                    }
                });

                if (!answered) {
                    allAnswered = false;
                }
            });

            if (!allAnswered) {
                alert('Будь ласка, відповідайте на всі запитання перед переходом на наступну сторінку.');
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
<h1>Сторінка 1: Виберіть одну правильну відповідь</h1>
<form method="POST" onsubmit="return validateForm()">
    <?php foreach ($keys as $key): ?>
        <div>
            <label><?php echo $key; ?></label>
            <input type="radio" name="answers[<?php echo $key; ?>]" value="A"> A
            <input type="radio" name="answers[<?php echo $key; ?>]" value="B"> B
            <input type="radio" name="answers[<?php echo $key; ?>]" value="C"> C
            <input type="radio" name="answers[<?php echo $key; ?>]" value="D"> D
        </div>
    <?php endforeach; ?>
    <button type="submit">Next</button>
</form>
</body>
</html>
