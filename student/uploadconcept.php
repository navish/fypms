<?php

if(isset($_POST["upload"])) {

   		$filename = $_FILES["filetoupload"]["name"];
        $filetype = $_FILES["filetoupload"]["type"];
        $filesize = $_FILES["filetoupload"]["size"];
    
       
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("concept-notes/" . $_FILES["filetoupload"]["name"])){
                echo $_FILES["filetoupload"]["name"] . " is already exists.";
            } else{
                move_uploaded_file($_FILES["filetoupload"]["tmp_name"], "concept-notes/" . $_FILES["filetoupload"]["name"]);
                echo "Your file was uploaded successfully.";
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } 

    else{
        echo "Error: " . $_FILES["filetoupload"]["error"];
    }
}

}

?>