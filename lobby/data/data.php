<?php
require '../tools/function.php';
$key = $_GET["keyword"];
$sql = "SELECT * FROM daftar WHERE name LIKE '%$key%' OR email LIKE '%$key%'";
$data = mysqli_query($conn, $sql);
$no = 1;
?>
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
        <?php while ($result = mysqli_fetch_assoc($data)) : ?>
        <tr class="md">
            <td scope="row"><?= $no++; ?></td>
            <td><img src="tools/img/<?= $result['gambar'] ?>" onerror="this.src='tools/img/Dani.jpg'"></td>
            <td><?= $result['name'] ?></td>
            <td><?= $result['email'] ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>