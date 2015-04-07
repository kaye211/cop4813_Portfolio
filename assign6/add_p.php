<?php
	$fName = $_POST['fName'];
	$lName = $_POST['lName'];
	$email = $_POST['email'];
	$grade = $_POST['grade'];
	$status = $_POST['status'];
	$major = $_POST['major'];
	$GPA = $_POST['GPA'];

	$mysql_access = mysql_connect('localhost', 'n00449176', 'copn00449176');

	if(!$mysql_access)
	{
		die("Could not connect" . mysql_error());
	}

	mysql_select_db('n00449176');

	$query = "INSERT INTO Student (studFname, studLname, studEmail, studGrade, studStatus, studMajor, studGPA) ";
	$query = $query . "VALUES ('$fName', '$lName', '$email', '$grade', '$status', '$major', $GPA)";

	$result = mysql_query($query, $mysql_access);

	header("Location: index.php ");
?>