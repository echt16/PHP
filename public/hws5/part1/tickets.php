<?php
$xmlFile = 'ticket.xml';

if (!file_exists($xmlFile)) {
    die("Die XML-Datei wurde nicht gefunden.");
}

$xml = simplexml_load_file($xmlFile);

if ($xml === false) {
    die("Fehler beim Laden der XML-Datei.");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tickets</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Tickets Information</h1>
    <p><strong>Date:</strong> <?php echo htmlspecialchars($xml->date); ?></p>

    <h2>Items</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Count</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($xml->items->item as $item): ?>
            <tr>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td><?php echo htmlspecialchars($item->count); ?></td>
                <td><?php echo htmlspecialchars($item->price); ?></td>
                <td><?php echo htmlspecialchars($item->total); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-secondary">Back</a>
</div>
</body>
</html>
