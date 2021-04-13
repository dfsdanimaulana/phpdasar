<?php

require 'function.php';

$id = $_GET["id"];
$img = $_GET["gambar"];

if (del($id) > 0) {
    removeImg($img);
    echo '<script>alert("Delete Success...");document.location.href= "update.php";</script>';
} else {
    echo '<script>alert("Delete Failed...");document.location.href= "update.php";</script>';
}