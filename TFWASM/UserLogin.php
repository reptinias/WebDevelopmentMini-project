<?php
	session_start();
	if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == 1){
		header("location: FrontPage.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
	 <div id = "frm" class = "login">  
        <h1>Login</h1>  
        <form name="f1" action = "Authentication.php" onsubmit = "return validation()" method = "POST">  
            <p>  
                <label> Username: </label>  
                <input type = "text" id ="user" name  = "user" />  
            </p>  
            <p>  
                <label> Password: </label>  
                <input type = "password" id ="pass" name  = "pass" />  
            </p>  
            <p>     
                <input type =  "submit" id = "btn" value = "Login" />  
            </p>  
        </form> 
        <p> New user? <a href="UserRegistration.php">Registrate here</a>.</p> 
    </div>  
    <!-- validation for empty field -->   
    <script>  
        function validation()  
        {  
            var id=document.f1.user.value;  
            var ps=document.f1.pass.value;  
            if(id.length=="" && ps.length=="") {  
                alert("User Name and Password fields are empty");  
                return false;  
            }  
            else  
            {  
                if(id.length=="") {  
                    alert("User Name is empty");  
                    return false;  
                }   
                if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                }  
            }                             
        }  
    </script>  
</body>
</html>