<?php
require 'tools/function.php';
if (isset($_POST["submit"])) {
    if (signUp($_POST) > 0) {
        echo "Sign Up Succes...";
        header('Location: login.php');
        exit;
    } else {
        echo "sign up failed...";
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
    <style>
        body {
            background-color: #eaeaea;
        }
        a {
            outline: none;
            text-decoration: none;
            font-family: sans-serif;
            color: white;
        }
    </style>
    <title>Sign Up</title>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark bg-gradient">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Sign Up</span>
        </div>
    </nav>

    <div class="container card my-3 p-2 shadow-sm">
        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">User Name :</label>
                <input type="text" class="form-control shadow-sm" id="username" name="username"required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address :</label>
                <input type="email" class="form-control shadow-sm" id="email" name="email" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">
                    We'll never share your email with anyone else.
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password :</label>
                <input type="password" class="form-control shadow-sm" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="passwordCheck" class="form-label">Check Password :</label>
                <input type="password" class="form-control shadow-sm" id="passwordCheck" name="passwordCheck" required>
            </div>
            <div class="d-flex flex-row-reverse mx-2">
                <button type="submit" class="btn btn-primary mb-3 shadow-sm" id="submit" name="submit">Submit</button>
                <button type="button" class="btn btn-primary mb-3 shadow-sm"><a href="login.php">Kembali</a></button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>