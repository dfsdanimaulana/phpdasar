<?php
session_start();
if (!$_SESSION["login"]) {
    header('Location:../login.php');
    exit;
}
require 'function.php';

$id = $_GET["id"];
$img = $_GET["gambar"];

if (del($id) > 0) {
    removeImg($img);
    echo '<script>alert("Delete Success...");</script>';
    header('Location: update.php');
    exit;
} else {
    echo '<script>alert("Delete Failed...");</script>';
    header('Location: update.php');
    exit;
}