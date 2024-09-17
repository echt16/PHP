<?php

?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<a href="{{route('news.create')}}" class="btn btn-success">Add new</a>
<div class="container mt-5">
    <h1>All News</h1>

    @if($news->isEmpty())
        <p>No news available at the moment.</p>
    @else
        <div class="list-group">
            @foreach($news as $item)
                <a href="view?id={{$item->id}}" class="list-group-item list-group-item-action">
                    <div style="display: flex; flex:1;">
                        <h5 class="mb-1">{{ $item->summary }}</h5>
                        <p class="mb-1">{{ $item->short_description }}</p>
                    </div>
                </a>
                <a href="editNew?id={{$item->id}}" class="btn btn-success">Edit</a>
            @endforeach
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
