<?php
session_start();
require 'tools/function.php';
if (isset($_COOKIE['id'])) {
    if (password_verify(checkUsernameById($_COOKIE["id"])[0], $_COOKIE["login"])) {
        $_SESSION["login"] = true;
    }
}
if (isset($_SESSION["login"])) {
    header('Location: index.php');
    exit;
}
if (isset($_POST["submit"])) {
    $nama = $_POST["username"];
    $pw = $_POST["password"];
    if (!isset(checkUser($nama)[0])) {
        echo "User Not Found";
    } else {
        if (password_verify($pw, checkUser($nama)[1])) {
            $_SESSION['login'] = true;

            if (isset($_POST["checkbox"])) {
                $cookieValue = password_hash(checkUser($nama)[0], PASSWORD_DEFAULT);
                setcookie('login', $cookieValue, time()+120);
                setcookie('id', checkUser($nama)[2], time()+120);
            } else {
                $_SESSION['test'] = true;
            }
            header('Location: index.php');
            exit;
        } else {
            echo "password yg anda masukan salah";
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Bootstrap 5 -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="tools/css/style.css">
    <title>Log In</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark bg-gradient">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Log in</span>
        </div>
    </nav>
    <div class="container card p-3 my-3">
        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">
                    We'll never share your email with anyone else.
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="checkbox" name="checkbox">
                <label class="form-check-label" for="checkbox">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Log in</button>
        </form>
    </div>
    <p>
        New User?<a href="signup.php" style="color:blue;">Sign Up</a>
    </p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>