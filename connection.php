<?php

$host = 'localhost';
$username = 'root';
$pw = '';
$db = 'phpdasar';

$conn = mysqli_connect($host,$username,$pw,$db);

$data = mysqli_query($conn,'SELECT * FROM daftar');

?>