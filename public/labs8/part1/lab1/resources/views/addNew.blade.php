<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Add News</h1>

    <form action="{{ route('news.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="summary" class="form-label">Summary (Заголовок)</label>
            <textarea class="form-control" id="summary" name="summary" rows="2" required></textarea>
        </div>

        <div class="mb-3">
            <label for="short_description" class="form-label">Short Description (Короткий опис)</label>
            <textarea class="form-control" id="short_description" name="short_description" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="full_text" class="form-label">Full Text (Повний текст)</label>
            <textarea class="form-control" id="full_text" name="full_text" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
