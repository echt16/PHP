<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["name"];

        $conn = new mysqli("localhost", "root", "password", "Shop");
        $insert = 'insert into sectors (name) values ("'.$name.'")';
        $conn->query($insert);
        $conn->close();

        header("Location:index.php");
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .main {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        button {
            width: 200px;
        }
    </style>
</head>
<body>
<form class="main" method="post">
    <div class="form-group mb-2">
        <label class="form-label">Sector name</label>
        <input onchange="isValid(event)" type="text" class="form-control" name="name">
    </div>
    <button class="btn btn-success" disabled id="btn">Add</button>
</form>

<script>
    function isValid(event){
        let btn = document.querySelector('#btn');
        if(event.target.value.length > 0){
            btn.removeAttribute('disabled');
        }
        else{
            btn.setAttribute('disabled', 'true');
        }
    }
</script>
</body>
</html>
