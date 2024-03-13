<?php
session_start();


if (!empty($_SESSION['is_auth'])){
    header('Location: /index.php');
    exit();

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['email'] === 'test@gmail.com' && $_POST['password'] === '12345678') {
        $_SESSION['is_auth'] = true;

        header('Location: /index.php');
        exit();
    }
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> PHP: Session, cookie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2 class="mt-5 mb-3">Registration</h2>
    <form method="POST" action="auth.php">

        <div class="form-group mt-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group mt-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">

        </div>
        <button type="submit" class="btn btn-primary mt-3">Sign up</button>
    </form>
</div>
</body>
</html>