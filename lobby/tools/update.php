<?php
session_start();
if (!$_SESSION["login"]) {
    header('Location:../login.php');
    exit;
}
require 'connection.php';

$sql = 'SELECT * FROM daftar';
if (isset($_POST["btn_search"])) {
    $key = $_POST["search"];

    $sql = "SELECT * FROM daftar WHERE name LIKE '%$key%' OR email LIKE '%$key%'";

}
$data = mysqli_query($conn, $sql);

$no = 1;
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Update Data</title>
</head>
<body>
    <!--Navbar-->
    <nav class="navbar navbar-dark bg-dark bg-gradient">
        <div class="container d-flex">
            <a class="navbar-brand" href="#">Update Data</a>
            <form action="" method="post" class="d-flex">
                <input id="search" name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button name="btn_search" class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <!--End Navbar-->
    <!-- tables -->
    <div class="container">
        <table class="table md table-striped table-dark mt-3 container">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($result = mysqli_fetch_assoc($data)) : ?>
                <tr class="md">
                    <td scope="row"><?= $no++; ?></td>
                    <td><a href="delete.php?id=<?= $result['id']; ?>&gambar=<?= $result['gambar'] ?>">Hapus</a> | <a href="ubah.php?id=<?= $result['id'] ?>">Ubah</a></td>
                    <td><img src="img/<?= $result['gambar'] ?>" onerror="this.src='img/Dani.jpg'"></td></td>
                <td><?= $result['name'] ?></td>
                <td><?= $result['email'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<div class="container">
    <button class="btn btn-dark bg-gradient" type="button"><a href="../index.php">Kembali</a></button>
</div>
<!-- end tables -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>