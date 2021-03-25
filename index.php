<?php
require 'connection.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <!-- tables -->
  <div class="container">
  <table class="table table-striped table-dark mt-3">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Gambar</th>
    </tr>
  </thead>
    <tbody>
    <?php while($result = mysqli_fetch_assoc($data)) :?>
    <tr>
      <th scope="row">1</th>
      <td><?= $result['nama']?></td>
      <td><?= $result['email']?></td>
      <td><?= $result['gambar']?></td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
</div>
  <!-- end tables -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>