<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        .form-container {
            margin-bottom: 20px;
        }
        .result-container {
            border: 1px solid #ddd;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<h1>Contact Us</h1>

<form method="post">
    <div class="form-container">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>
        <br><br>
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>
        <br><br>
        <button type="submit">Send</button>
    </div>
</form>

<div class="result-container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = htmlspecialchars($_POST['name']);
        $phone = htmlspecialchars($_POST['phone']);
        $message = htmlspecialchars($_POST['message']);

        echo "<h2>Form Submission Result:</h2>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Phone:</strong> $phone</p>";
        echo "<p><strong>Message:</strong> $message</p>";
    }
    ?>
</div>

</body>
</html>
