<?php 

$Username = $_REQUEST['Username'];
$Password = $_REQUEST['Password'];
$Date =  date("Y/m/d");

include("ConnectSQL.php");

$sql = "INSERT INTO Users (Username, Password, Date_created) VALUES ('$Username', '$Password', '$Date')";

if (mysqli_query($connect, $sql)) {
    echo "Connected";
    header("location: UserLogin.php");
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

?>