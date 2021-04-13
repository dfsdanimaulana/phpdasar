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
    <style>
        img {
            width: 40px;
        }
    </style>
    <title>debugging</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- File input field -->
        <input type="file" id="file" onchange="return fileValidation(this.id)" />

        <!-- Image preview -->
        <div id="imagePreview"></div>
        <button type="submit" id="submit" name="submit">Submit</button>
    </form>
    <script>
        function fileValidation(id) {
            var fileInput = document.getElementById(id);
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
                fileInput.value = '';
                return false;
            } else {
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
    </script>
</body>
</html>