<?php
session_start();

$questions = [
    'Питання 11?' => ['A', 'B', 'C', 'D'],
    'Питання 12?' => ['A', 'B', 'C', 'D'],
    'Питання 13?' => ['A', 'B', 'C', 'D'],
    'Питання 14?' => ['A', 'B', 'C', 'D'],
    'Питання 15?' => ['A', 'B', 'C', 'D'],
    'Питання 16?' => ['A', 'B', 'C', 'D'],
    'Питання 17?' => ['A', 'B', 'C', 'D'],
    'Питання 18?' => ['A', 'B', 'C', 'D'],
    'Питання 19?' => ['A', 'B', 'C', 'D'],
    'Питання 20?' => ['A', 'B', 'C', 'D']
];
$correct_answers = [
    ['A', 'B'],
    ['C', 'D'],
    ['A', 'C'],
    ['B', 'D'],
    ['A', 'D'],
    ['B', 'C'],
    ['A', 'B', 'C'],
    ['A', 'C', 'D'],
    ['B', 'C', 'D'],
    ['A', 'B', 'D']
];

$keys = array_keys($questions);
shuffle($keys);
$_SESSION['questions_page2'] = $keys;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answers = $_POST['answers'];
    $score = 0;

    foreach ($answers as $key => $answer_set) {
        if (isset($correct_answers[$key])) {
            sort($answer_set);
            sort($correct_answers[$key]);
            if ($answer_set == $correct_answers[$key]) {
                $score += 3;
            }
        }
    }

    $_SESSION['score'] += $score;
    header('Location: questions_page3.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Тестова форма - Сторінка 2</title>
    <script>
        function validateForm() {
            const form = document.querySelector('form');
            const questions = form.querySelectorAll('div');
            let allAnswered = true;

            questions.forEach(question => {
                const checkboxes = question.querySelectorAll('input[type="checkbox"]');
                let answered = false;
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
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
<h1>Сторінка 2: Виберіть кілька правильних відповідей</h1>
<form method="POST" action="questions_page2.php" onsubmit="return validateForm()">
    <?php foreach ($keys as $key): ?>
        <div>
            <label><?php echo $key; ?></label>
            <?php foreach ($questions[$key] as $option): ?>
                <input type="checkbox" name="answers[<?php echo $key; ?>][]" value="<?php echo $option; ?>"> <?php echo $option; ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
    <button type="submit">Next</button>
</form>
</body>
</html>
