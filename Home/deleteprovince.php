<?php
	include('connect.php');
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	ob_start();
    session_start();
    if (($_SESSION['role'] != 1) ) {
        header("location: index.php");
	}
	$id = $_GET['id'];
	if (isset($id)) {
		$conn->query("DELETE FROM province where id=".$id.";");
		header("location:indexprovince.php");
	}
	include('endconnect.php');
?>
