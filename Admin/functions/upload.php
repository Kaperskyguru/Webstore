
<?php

$target_file = '';
$target_dir = "uploads/";
$target_file = $target_dir . $_FILES["uploadFile"]["name"];
$uploadOK = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// check if image is a actual image

if (isset($_POST['submit'])) {

    
}

function getFileLocation() {
    return $target_file;
}
