
<?php 
    require "connect.php";
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    ob_start();
    session_start();

    if (($_SESSION['username'] != "admin" || $_SESSION['role'] != 1) ) {
        $_SESSION['error']="Bạn không có quyền thực hiện hành động này!";
        header("location: index.php");
    }else{
    	$id = $_GET['id'];
		if (isset($id)) {
			$conn->query("DELETE FROM employee where id=".$id.";");
			header("location:index.php");
		}
		include('endconnect.php');
    }
	
	
?>
