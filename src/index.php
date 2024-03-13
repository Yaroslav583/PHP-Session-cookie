<?php
session_start();

if (empty($_SESSION['is_auth'])){
    header('Location: /auth.php');
    exit();

}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['theme'])) {
    $currentTheme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light';
    if ($currentTheme === 'dark' && $_POST['theme'] === 'light') {
        $theme = 'light';
    } else {
        $theme = $_POST['theme'];
    }


    setcookie('theme', $theme, time() + (365 * 24 * 60 * 60));


    header('Location: /' );
    exit;
}


$theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light';

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP: Session, cookie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <style>

        .dark {
            background-color: #333;
            color: #fff;
        }
    </style>


</head>
<body class="<?php echo $theme === 'dark' ? 'dark' : 'light'; ?>">

<div class="container">

    <h1 class="text-center">HOME/SECURITY</h1>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <div class="form-check">
            <input class="form-check-input" type="radio" name="theme" value="light" id="lightTheme"
                <?php echo $theme === 'light' ? 'checked' : 'dark'; ?>>
            <label class="form-check-label" for="lightTheme">Light</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="theme" value="dark" id="darkTheme"
                <?php echo $theme === 'dark' ? 'checked' : 'light'; ?>>
            <label class="form-check-label" for="darkTheme">Dark</label>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save</button>

    </form>

</div>
</body>
</html>
