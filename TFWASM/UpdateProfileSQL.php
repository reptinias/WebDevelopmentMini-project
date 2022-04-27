<?php
	session_start();
	include('ConnectSQL.php');

	$msg = "";

	$User = $_SESSION['Username'];
    $Bio = $_POST['Bio'];  
    $Avatar = $_POST['Avatar'];

    $filename = $_FILES["Avatar"]["name"];
    $tempname = $_FILES["Avatar"]["tmp_name"];    
    $folder = "image/".$filename;

    $sql = "UPDATE users SET Bio = '$Bio', Avatar = '$filename' WHERE Username= '$User'";


    if (move_uploaded_file($tempname, $folder))  {
        $msg = "Image uploaded successfully";
    }
    else{
        $msg = "Failed to upload image";
    }

    if ($connect->query($sql) === TRUE) {
	    echo "Connected";	    
	    header("location: Profile.php");
	} else {
	    header("location: UpdateProfile.php");
	}


?>

