<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="stylesheet.css">
</head>
<label>
<div class="login">
	<h1>Sign up</h1>
		<form name = "f1" method="post" action = "RegInsertSQL.php"/>
			<input type="hidden" name="submitted" value="true" />

			<label>Username: </label><input type="text" name="Username" id="Username"/>
			</br>
			
			<label>Password: </label><input type="password" name="Password" id="Password"/>
			</br>
			
			<input type="submit" value="Regitrate" size="100px;" />
		</form>
		<p> Already a user? <a href="UserLogin.php">Login here</a>.</p> 
</div>

<script>  
    function validation()  
    {  
        var id=document.f1.Username.value;  
        var ps=document.f1.Password.value;  
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
