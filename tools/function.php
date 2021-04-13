<?php
require 'connection.php';

function add($data) {
    global $conn;
    $nama = $data["name"];
    $email = $data["email"];
    // $gambar = $data["gambar"];
    //upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
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

function upload() {
    $nama = $_FILES["gambar"]["name"];
    $size = $_FILES["gambar"]["size"];
    $err = $_FILES["gambar"]["error"];
    $tmp_name = $_FILES["gambar"]["tmp_name"];

    //gambar yg di upload
    if ($err === 4) {
        echo '<script>alert("please uplode gambar!");</script>';
        return false;
    }
    //cek yg di upload
    $ekstValid = ['jpg',
        'jpng',
        'png'];
    $eks = end(explode('.', $nama));
    $eks = strtolower($eks);
    //cek string di array
    if (!in_array($eks, $ekstValid)) {
        echo '<script>alert("bukan gambar!");</script>';
        return false;
    }
    //cek size
    if ($size > 1000000) {
        echo '<script>alert("terlalu besar!");</script>';
        return false;
    }
    //ganti nama
    $newNama = uniqid();
    $newNama .= '.';
    $newNama .= $eks;
    //upload ke direktori
    move_uploaded_file($tmp_name, 'img/'.$newNama);
    return $newNama;

}