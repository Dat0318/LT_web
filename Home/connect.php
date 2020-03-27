<?php
	$servername = "localhost";
	$database = "employee";
	$username = "root";
	$password = "";
	
	$conn = mysqli_connect($servername, $username, $password, $database);
	 mysqli_set_charset($conn, 'UTF8');
	if(!$conn){
		die("Connection fail: ".mysqli_connect_error());
		exit();
	}
	else{
		// echo "Connect thanh cong";
	}
	// function employeeDetail($id){
 //    global $conn;
 //    $sql = "SELECT * FROM employee";
 //    $row = mysqli_query($conn, $sql);
 //    $employee = mysqli_fetch_assoc($row);
 //    return $employee;
 //  }
?>