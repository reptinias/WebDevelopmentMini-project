<?php
	session_start();
	if($_SESSION['signed_in'] != 1){
		header("location: UserLogin.php");
	}

	include("ConnectSQL.php");
	
	$_SESSION['Post_ID'] = $_GET["ID"];
	$Post_ID = $_SESSION['Post_ID'];

	function loadData($result){

		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			echo "<div class ='threadbox'> ". $row["Title"]. " <br> " 
											. $row["Content"]. " <br> "
											. "<img src=threadImages/". $row["Image"]. "> <br> "
											. $row["Author"] . "</div><br>";
	    }
	}
	function loadComments($result){
	    

		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()) {
	        	echo " <div class ='commentbox'> Author: ". $row["Author"] . " <br> " . $row["Content"]. " <br> ". $row["Date_created"] . " </div>";
	    	}
	    }
	    else {
	        echo "0 results";
	    } 
	}

	
?>

<!DOCTYPE html>

<style media="screen">
    body {
	  margin: 0;
	  font-family: Arial, Helvetica, sans-serif;
	}

	.topnav {
	  overflow: hidden;
	  background-color: #EBEBEB;
	}

	.topnav a {
	  float: left;
	  color: black;
	  text-align: center;
	  padding: 14px 16px;
	  text-decoration: none;
	  font-size: 17px;
	}

	.topnav a:hover {
	  background-color: #ddd;
	  color: grey;
	}

	.topnav a.active {
	  background-color: #73AD21;
	  color: black;
	}


    .threadbox {
	  margin: auto;
	  width: 60%;
	  border: 5px solid #73AD21;
	  padding: 10px;
	  background-color: #EBEBEB;
	  text-align: center;
    }

    .commentbox {
	  margin: auto;
	  width: 60%;
	  border-top: 3px solid #73AD21;
	  border-bottom: 3px solid #73AD21;
	  background-color: #EBEBEB;
	  text-align: center;
    }

    textarea {
	  width: 60%;
	  height: 150px;
	  padding: 12px 20px;
	  box-sizing: border-box;
	  border: 2px solid #ccc;
	  border-radius: 10px;
	  background-color: #EBEBEB;
	  font-size: 14px;
	  resize: none;
	  display: block;
	  margin-left: auto;
      margin-right: auto;
	}

  a:link{
    	text-decoration:none ;
	}

	img {
  		height: 60%;
  		width: 60%;
	}
</style>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<div class="topnav">
  <a class="active" href="LoadThreads.php">Home</a>
  <a href="Profile.php">Profile</a>
  <a href="CreateThread.php">Create Thread</a>
  <a href="Session.php">Log out</a>
</div>

<?php 
	$sql = "SELECT * FROM posts WHERE ID = '$Post_ID'";
	$result = $connect->query($sql);
	loadData($result);

	$sql = "SELECT * FROM comments WHERE Post_ID = '$Post_ID'";
	$result = $connect->query($sql);
	loadComments($result)
?>
	<form method="post" action = "CommentSQL.php"/>
		<input type="hidden" name="submitted" value="true" />

		<textarea name="Comment" id="Comment" rows="4" cols="50" required> Comment </textarea>
		</br>
		
		<input type="submit" value="Create Comment" size="100px;" />
	</form>
</body>
</html>