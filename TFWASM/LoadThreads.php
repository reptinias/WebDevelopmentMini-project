<?php
	session_start();
	if($_SESSION['signed_in'] != 1){
		header("location: UserLogin.php");
	}

	include('ConnectSQL.php');
	$Username = $_SESSION['Username'];

	function threads($result){		
		if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	
			echo "<div class ='subthreadbox'><a href='SingleThread.php?ID=".$row['ID']."'> <br> ". 
		    	$row["Title"]. " <br> ". 
		    	$row["Content"]. " <br> ". 
		    	"<img src=threadImages/". $row["Image"]. "> <br> ". 
		    	"Author: ".$row["Author"]."<br></a></div>";
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
    
    .threadbox {
	  margin: auto;
	  width: 60%;
	  border: 5px solid #73AD21;
	  padding: 10px;
	  background-color: #EBEBEB;
	  text-align: center;
    }

    .subthreadbox {
	  margin: auto;
	  width: 100%;
	  border-top: 3px solid #73AD21;
	  border-bottom: 3px solid #73AD21;
	  background-color: #EBEBEB;
	  text-align: center;
    }

    a:link{
    	text-decoration:none ;
    }
    
    hr.divider{
    	border: 2px solid #73AD21;
    	width:  100%;
    	margin: auto;
    }

    .login{
        position: absolute;
        top: 5%;
        left: 90%;
        width: 10%;
    }

    img {
  		height: 60%;
  		width: 60%;
	}

</style>
<div class="topnav">
  <a class="active" href="LoadThreads.php">Home</a>
  <a href="Profile.php">Profile</a>
  <a href="CreateThread.php">Create Thread</a>
  <a href="Session.php">Log out</a>
</div>
	<div class = "threadbox">
	<h2>My threads.</h2>
    <?php
	
	$sql = "SELECT * FROM posts WHERE Author = '$Username'";
	$result = $connect->query($sql); 
	threads($result);
	?>
   	</div><br>

   	
	<div class = "threadbox">
	<h2>Other threads.</h2>
    <?php
	
	$sql = "SELECT * FROM posts WHERE Author != '$Username'";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
    
		//echo "<a href='SingleThread.php?ID=".$row['ID']."'>ID: ". $row["ID"]. "  Title:". $row["Title"]. " Content:". $row["Content"]. " Image:". $row["Image"] ." Date:". $row["Date_created"] . " Author:". $row["Author"] . "<br></a>";
        //}
		threads($result);
	}
?>
<form method="post">
        <input type="submit" name="Refresh" class="button" value="Refresh" />
    </form>
</div>
	
	<?php
        if(array_key_exists('Refresh', $_POST)) {
            threads($result);
            echo "Refreshed";
        }
    ?>