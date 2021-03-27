<?php
require 'tools/connection.php';

$sql = 'SELECT * FROM daftar';
if (isset($_POST["btn_search"])) {
  $key = $_POST["search"];

  $sql = "SELECT * FROM daftar WHERE nama LIKE '%$key%' OR email LIKE '%$key'";

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
  <style>
    a {
      outline: none;
      text-decoration: none;
      font-family: sans-serif;
      color: white;
    }
  </style>
  <title>Hello, world!</title>
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
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($result = mysqli_fetch_assoc($data)) : ?>
        <tr class="md">
          <td scope="row"><?= $no++; ?></td>
          <td><?= $result['gambar'] ?></td>
          <td><?= $result['nama'] ?></td>
          <td><?= $result['email'] ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <div class="d-grid gap-2 container">
    <button class="btn btn-dark bg-gradient" type="button"><a href="tools/add.php">Tambah Data</a></button>
    <button class="btn btn-dark bg-gradient" type="button"><a href="tools/update.php">Ubah Data</a></button>
  </div>
  <!-- end tables -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>