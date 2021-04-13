<?php

require 'function.php';

$id = $_GET["id"];
//var_dump($id); die;

if (del($id) > 0) {
    echo '<script>alert("Delete Success...");document.location.href= "update.php";</script>';
} else {
    echo '<script>alert("Delete Failed...");document.location.href= "update.php";</script>';
}