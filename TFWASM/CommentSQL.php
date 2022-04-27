<?php

	session_start();
	include('ConnectSQL.php');

	$Post_ID = $_SESSION['Post_ID'];
	$User = $_SESSION['Username'];
	$Content = $_REQUEST['Comment'];
	$Date =  date("Y/m/d");

	$sql = "INSERT INTO comments (Post_ID, Content, Date_created, Author) VALUES ('$Post_ID', '$Content', '$Date', '$User')";

	if (mysqli_query($connect, $sql)) {
	    echo "Connected";
	    header("location: SingleThread.php?ID=".$Post_ID."");
	} else {
	    echo "Error: " . $sql . "<br>" . $connect->error;
	}

?>