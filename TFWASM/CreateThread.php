<?php
	session_start();
	if($_SESSION['signed_in'] != 1){
		header("location: UserLogin.php");
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

	.contentbox {
	  margin: auto;
	  width: 60%;
	  border: 5px solid #73AD21;
	  padding: 10px;
	  background-color: #EBEBEB;
	  text-align: center;
    }

    input{
    	width: 60%;
    }

    textarea{
    	width: 60%;
    	resize: none;
    }

</style>
<html>
<head>
</head>
<body>
<div class="topnav">
  <a href="LoadThreads.php">Home</a>
  <a href="Profile.php">Profile</a>
  <a class="active" href="CreateThread.php">Create Thread</a>
  <a href="Session.php">Log out</a>
</div>
<br>
<div class="contentbox">
<form method="post" action = "ThreadSQL.php" enctype="multipart/form-data"/>
	<input type="hidden" name="submitted" value="true" />
	
	<label>Title: </label><br><input type="text" name="Title" id="Title" required/>
	</br>
	
	<label>Thread Text: </label><br><textarea name="Text" id="Text" rows="4" cols="50" required>  </textarea>
	</br>

	<label>Image: </label><br><input type="file" name="Image" id="Image" value=" " />
	</br><br>
	
	<input type="submit" value="Create Thread" size="100px;" />
</form>
</div>
</body>
</html>
