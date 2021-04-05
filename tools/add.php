<?php
require 'function.php';

if (isset($_POST["submit"])) {
    if (add($_POST) > 0) {
        echo "success";
    } else {
        echo "failed";
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
        a {
            outline: none;
            text-decoration: none;
            font-family: sans-serif;
            color: white;
        }
    </style>
    <title>Tambah Data</title>
</head>
<body>
    <!--Navbar-->
    <nav class="navbar navbar-dark bg-dark bg-gradient">
        <div class="container">
            <a class="navbar-brand" href="#">Tambah Data</a>
        </div>
    </nav>
    <!--End Navbar-->
    <div class="container my-3">
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nama :</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address :</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="mb-3">
                <label class="form-label" for="gambar">Gambar :</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>

            <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
            <button class="btn btn-dark bg-gradient" type="button"><a href="http://localhost:8080/phpdasar/index.php">Kembali</a></button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>