<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form method="post" action="{{route('login.request')}}" class="container">
    @csrf
    <div class="form-group">
        <label class="form-label">Email</label>
        <input required type="email" class="form-control" name="email">
    </div>
    <button class="btn btn-success">Log in</button>
</form>
<form method="post" action="{{route('login.check')}}" class="container">
    @csrf
    <div class="form-group">
        <label class="form-label">Code</label>
        <input required type="number" class="form-control" name="code">
    </div>
    <button class="btn btn-success">Log in</button>
</form>
</body>
</html>
