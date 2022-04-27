<?php

	CREATE DATABASE exam;


	CREATE TABLE comments (
	    ID INT 					NOT NULL AUTO_INCREMENT,
	    Post_ID INT 			NOT NULL,
	    Content TEXT,
	    Date_created DATE,
	    Author VARCHAR (30),
	    PRIMARY KEY (ID)
	);
	
	CREATE TABLE posts (
	    ID INT  				NOT NULL AUTO_INCREMENT,
	    Title VARCHAR (256),
	    Content TEXT,
	    Image VARCHAR (100),
	    Date_created DATE,
	    Author VARCHAR (30),
	    PRIMARY KEY (ID)
	);
	
	CREATE TABLE users (
	    ID INT  				NOT NULL AUTO_INCREMENT,
	    Username VARCHAR (30)	UNIQUE,
	    Password VARCHAR (30),
	    Bio TEXT,
	    Avatar VARCHAR (100),
	    Date_created DATE,
	    PRIMARY KEY (ID)
	);

	
	include("ConnectSQL.php");
	$date = date('Y/m/d');

	$sql = "INSERT INTO Users (Username, Password, Date_created) VALUES ('Mikael', '123456789', $date)";
	mysqli_query($connect, $sql);
	$sql = "INSERT INTO Users (Username, Password, Date_created) VALUES ('Bent', '987654321', $date)";
	mysqli_query($connect, $sql);
	$sql = "INSERT INTO Users (Username, Password, Date_created) VALUES ('Freja', 'abcde', $date)";
	mysqli_query($connect, $sql);

	$sql = "INSERT INTO Posts (Title, Content, Date_created, Author) VALUES ('Post 1', 'Det her er en post', $date, 'Mikael')";
	mysqli_query($connect, $sql);
	$sql = "INSERT INTO Posts (Title, Content, Date_created, Author) VALUES ('Post 2', 'Det her er en post mere', $date, 'Mikael')";
	mysqli_query($connect, $sql);
	$sql = "INSERT INTO Posts (Title, Content, Date_created, Author) VALUES ('Post 3', 'Det her er sidste post', $date, 'Bent')";
	mysqli_query($connect, $sql);

	$sql = "INSERT INTO Comments (Post_ID, Content, Date_created, Author) VALUES ('1', 'Comment 1', $date, 'Mikael')";
	mysqli_query($connect, $sql);
	$sql = "INSERT INTO Comments (Post_ID, Content, Date_created, Author) VALUES ('2', 'Comment 2', $date, 'Bent')";
	mysqli_query($connect, $sql);
	$sql = "INSERT INTO Comments (Post_ID, Content, Date_created, Author) VALUES ('1', 'Comment 3', $date, 'Freja')";
	mysqli_query($connect, $sql);
	$sql = "INSERT INTO Comments (Post_ID, Content, Date_created, Author) VALUES ('3', 'Comment 4', $date, 'Bent')";
	mysqli_query($connect, $sql);
	$sql = "INSERT INTO Comments (Post_ID, Content, Date_created, Author) VALUES ('1', 'Comment 5', $date, 'Freja')";
	mysqli_query($connect, $sql);
?>