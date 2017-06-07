<?php
$target_dir = "../review-reports/";
$target_file = $target_dir . basename($_FILES["report"]["name"]);
$uploadOk = 1;
$errMessage = "";
$reportFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check file is doc or pdf
if(isset($_POST["submit"])) {

} else {
    exit();
}
// Allow certain file formats
if($reportFileType != "doc" && $reportFileType != "docx" && $reportFileType != "pdf") {
    $errMessage += "Sorry, only Word Document files are allowed. <br /> ";
    $uploadOk = 0;
}
    
// Check if file already exists
if (file_exists($target_file)) {
    $errMessage += "Sorry, a file with a similar name already exists. <br />";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk != 0) {
    if (move_uploaded_file($_FILES["report"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["report"]["name"]). " has been uploaded.";
    } else {
        $errMessage += "Sorry, there was an error uploading your file. <br />";
    }
   
// if everything is ok, try to upload file
} 
?>
