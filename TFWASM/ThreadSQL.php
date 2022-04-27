<?php
	session_start();
	if($_SESSION['signed_in'] != 1){
		header("location: UserLogin.php");
	}
	include('ConnectSQL.php'); 

	$Title = $_REQUEST['Title'];
	$Text = $_REQUEST['Text'];
	$Date =  date("Y/m/d");
	$Author = $_SESSION['Username'];

	$filename = $_FILES["Image"]["name"];
    $tempname = $_FILES["Image"]["tmp_name"];    
    $folder = "threadImages/".$filename;

	$sql = "INSERT INTO posts (Title, Content, Image, Date_created, Author) VALUES ('$Title','$Text', '$filename', '$Date', '$Author')";

	if (move_uploaded_file($tempname, $folder))  {
        $msg = "Image uploaded successfully";
    }
    else{
        $msg = "Failed to upload image";
    }

	if (mysqli_query($connect, $sql)) {
	    echo "Connected";
	    header("location: LoadThreads.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $connect->error;
	}
?>