<?php
require 'connection.php';

function add($data) {
    global $conn;
    $name = $data["name"];
    $email = $data["email"];
    // $gambar = $data["gambar"];
    //upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    $add = "INSERT INTO daftar VALUES (NULL,'$name','$email','$gambar')";
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
    $name = $_FILES["gambar"]["name"];
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
    $eks = end(explode('.', $name));
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
    $newname = uniqid();
    $newname .= '.';
    $newname .= $eks;
    //upload ke direktori
    move_uploaded_file($tmp_name, 'img/'.$newname);
    return $newname;

}

function update($data) {
    global $conn;
    $id = $data["id"];
    $name = $data["name"];
    $email = $data["email"];
    $gambarLama = $data["gambarLama"];
    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $sql = "UPDATE daftar SET id=$id, name='$name', email='$email', gambar='$gambar' WHERE id=$id";
    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}