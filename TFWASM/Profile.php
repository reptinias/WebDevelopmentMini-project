<?php 
	session_start();
	if($_SESSION['signed_in'] != 1){
		header("location: UserLogin.php");
	}

	include("ConnectSQL.php");

	$Username = $_SESSION['Username'];

	function threads($result){		
		if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	
			echo "<div class ='subthreadbox'><a href='SingleThread.php?ID=".$row['ID']."'> <br> ". 
		    	$row["Title"]. " <br> ". 
		    	$row["Content"]. " <br> ". 
		    	$row["Image"]. "<br></a></div>";
			}

	    }else {
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

	img {
  		height: 60%;
  		width: 60%;
	}

	.contentbox {
	  margin: auto;
	  width: 60%;
	  border: 5px solid #73AD21;
	  padding: 10px;
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

    .login{
        position: absolute;
        top: 5%;
        left: 90%;
        width: 10%;
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
	  <a href="LoadThreads.php">Home</a>
	  <a class="active" href="Profile.php">Profile</a>
	  <a href="CreateThread.php">Create Thread</a>
	  <a href="Session.php">Log out</a>
	</div>



	<?php
	$Username = $_SESSION['Username'];

	$sql = "SELECT * FROM users WHERE Username = '$Username'";
	$result = $connect->query($sql);

	if($result->num_rows > 0){
		$row = $result->fetch_assoc();

		$bio = $row["Bio"];
		$avatar = $row["Avatar"];
		$DateCreated = $row["Date_created"];
    }
	?> 




	<div id = "myDIV" class="contentbox"> 
	<h1>My profile</h1>
	<img src="<?php echo "image/". $avatar;?>">
	<?php
	echo "<h2>".$Username."</h2><br>";
	echo $bio."<br>";
	echo "Member since: ".$DateCreated."<br>";


	//echo "<a href=UpdateProfile.php>Update profile</a>.";
	?>

	<button onclick="myFunction()">Update profile</button>
	</div>




	<div id = "updateDIV" class="contentbox" style="display:none">
	<h1>Update profile</h1>
	<form method="post" action = "UpdateProfileSQL.php" enctype="multipart/form-data"/>
		<input type="hidden" name="submitted" value="true" />
		
		<label>Avatar: </label><input type="file" name="Avatar" id="Avatar" value = ""/>
		</br>
		
		<label>Bio: </label><textarea name="Bio" id="Bio" rows="4" cols="50"> </textarea>
		</br>
		
		<input type="submit" value="Update" size="100px;"/>
	</form>
	<button onclick="myFunction()">Cancel</button>
	</div>






	<script text = "text/javascript">


		function myFunction() {
		  var x = document.getElementById("myDIV");
		  var y = document.getElementById("updateDIV");
		  if (x.style.display === "none") {
		    x.style.display = "block";
		    y.style.display = "none";
		  } else {
		    x.style.display = "none";
		    y.style.display = "block";
		  }
		}
	</script>

	<div class = "contentbox">
	<h2>My threads.</h2>
    <?php
	
	$sql = "SELECT * FROM posts WHERE Author = '$Username'";
	$result = $connect->query($sql); 
	threads($result);
	?>
   	</div><br>
</body>
</html>