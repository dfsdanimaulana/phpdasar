<?php
if (isset($_POST["submit"])) {
    var_dump($_FILES);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>debugging</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" id="gambar" name="gambar">
        <button type="submit" id="submit" name="submit">Submit</button>
    </form>
</body>
</html>