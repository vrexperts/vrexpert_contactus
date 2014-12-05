<?php
	if( !isset($_FILES['file1']) ) {
		echo "ERROR: Please browse for a file before clicking   the upload button."; exit(); 
	}

	$fileName = $_FILES["file1"]["name"]; // The file name
	$fileTmpLoc = $_FILES["file1"]["tmp_name"];
	$fileType = $_FILES["file1"]["type"];
	$fileSize = $_FILES["file1"]["size"];
	$fileErrorMsg = $_FILES["file1"]["error"];
	
	if (!$fileTmpLoc) {
    	echo "ERROR: Please browse for a file before clicking   the upload button."; exit(); 
	}
	
	if(move_uploaded_file($fileTmpLoc, "uploads/$fileName"))
                   { echo "$fileName upload is complete"; }
                    else
                   { echo "move_uploaded_file function failed"; }