<?php
session_start();
require 'tools/connection.php';
require 'tools/function.php';
if (isset($_COOKIE['id'])) {
    if (password_verify(checkUsernameById($_COOKIE["id"])[0], $_COOKIE["login"])) {
        $_SESSION["login"] = true;
    }
}
if (!$_SESSION["login"]) {
    header('Location: login.php');
    exit;
}
//Pagination
//jumlah data yg tampil
$batas = 4;
//cek apakah ada data halaman yg di kirim
$halaman = isset($_GET["halaman"])?(int)$_GET["halaman"]:1;
$halaman_awal = ($halaman > 1)?($halaman*$batas)-$batas:0;

$sql = 'SELECT * FROM daftar';
$data = mysqli_query($conn, $sql);

$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data/$batas);
//query data yg muncul di tiap halaman
$query = "SELECT * FROM daftar LIMIT $halaman_awal, $batas";
if (isset($_POST["btn_search"])) {
    $key = $_POST["search"];
    $query = "SELECT * FROM daftar WHERE name LIKE '%$key%' OR email LIKE '%$key%' LIMIT $halaman_awal, $batas";
}
$data_per_halaman = mysqli_query($conn, $query);
$no = $halaman_awal+1;
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="tools/css/style.css">
    <title>My Data : Lobby</title>
</head>
<body>
    <!--Navbar-->
    <nav class="navbar navbar-dark bg-dark bg-gradient">
        <div class="container d-flex">
            <a class="navbar-brand" href="#">Lobby</a>
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
                    <th scope="col">Gambar</th>
                    <th scope="col">name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($result = mysqli_fetch_assoc($data_per_halaman)) : ?>
                <tr class="md">
                    <td scope="row"><?= $no++; ?></td>
                    <td><img src="tools/img/<?= $result['gambar'] ?>" onerror="this.src='tools/img/Dani.jpg'"></td>
                    <td><?= $result['name'] ?></td>
                    <td><?= $result['email'] ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <div class="container">
        <ul class="pagination justify-content-center">

            <?php if ($halaman > 1) : ?>
            <li class="page-item">
                <a href="?halaman=<?=$halaman-1; ?>" class="page-link">prev</a>
            </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>

            <?php if ($i == $halaman) : ?>
            <li class="page-item">
                <a href="?halaman=<?php echo $i; ?>" class="page-link bg-info"><?php echo $i; ?></a>
            </li>

            <?php else : ?>
            <li class="page-item">
                <a href="?halaman=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
            </li>
            <?php endif; ?>

            <?php endfor; ?>

            <?php if ($halaman < $total_halaman) : ?>
            <li class="page-item">
                <a href='?halaman=<?=$halaman+1; ?>' class="page-link">Next</a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
    <div class="d-grid gap-2 container">
        <button class="btn btn-dark bg-gradient" type="button"><a href="tools/add.php">Tambah Data</a></button>
        <button class="btn btn-dark bg-gradient" type="button"><a href="tools/update.php">Ubah Data</a></button>
        <button class="btn btn-dark bg-gradient" type="button"><a href="logout.php">Log Out</a></button>
    </div>
    <!-- end tables -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>