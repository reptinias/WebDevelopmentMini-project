<?php
	session_start();
	if($_SESSION['signed_in'] != 1){
		header("location: UserLogin.php");
	}

	include('ConnectSQL.php');



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<form method="post" action = "UpdateProfileSQL.php"/>
		<input type="hidden" name="submitted" value="true" />
		
		<label>Avatar: </label><input type="file" name="Avatar" id="Avatar"/>
		</br>
		
		<label>Bio: </label><textarea name="Bio" id="Bio" rows="4" cols="50"> Bio </textarea>
		</br>
		
		<input type="submit" value="Create Thread" size="100px;" />
	</form>

</body>
</html>