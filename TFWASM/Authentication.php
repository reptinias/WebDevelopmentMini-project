<?php
    session_start();
    include('Session.php');
    include('ConnectSQL.php');
    $username = $_POST['user'];  
    $password = $_POST['pass'];
    
      
      
    //to prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($connect, $username);  
    $password = mysqli_real_escape_string($connect, $password);  
  
    $sql = "SELECT * FROM Users WHERE Username = '$username' and Password = '$password'";  
    $result = mysqli_query($connect, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
      
    if($count == 1){  
        $_SESSION['signed_in'] = true;
        $_SESSION['Username'] = $row['Username'];
        $_SESSION['ID'] = $row['ID'];
        echo "<h1><center> Login successful </center></h1>";  
        
        header("location: LoadThreads.php");
    }  
    else{  
        echo "<h1> Login failed. Invalid username or password.</h1>";  
        //header("location: UserLogin.php");
    }     
?>  