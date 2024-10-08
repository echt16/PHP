<?php

?>


    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>{{$new->summary}}</h1>
    @if(isset($new->image_path))
        <img style="max-width: 50%; max-height: 300px" src="{{asset('storage/'.$new->image_path)}}"/>
    @endif
    <p>{{$new->full_text}}</p>
</div>
</body>
</html>
