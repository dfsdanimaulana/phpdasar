<?php
require 'connection.php';

function add($data) {
    global $conn;
    $nama = $data["name"];
    $email = $data["email"];
    $gambar = $data["gambar"];
    $add = "INSERT INTO daftar VALUES (NULL,'$nama','$email','$gambar')";
    mysqli_query($conn, $add);
    return mysqli_affected_rows($conn);
}

function del($id) {
    global $conn;
    $sql = "DELETE FROM daftar WHERE id=$id";
    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);

}