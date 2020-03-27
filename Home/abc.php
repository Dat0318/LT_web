<?php 
include_once("connect.php");
if($_POST['id']){
	$sql = "SELECT `id`,`name` FROM `distristict` WHERE `distristict`.`province_id`=".$_POST['id'].";";
	$result = mysqli_query($conn,$sql);
	if (!$result) {
		die("Không thể thực hiện câu lệnh SQL: " . mysqli_error($conn));
		exit();
	}
	$html = '';
	while($row = mysqli_fetch_array($result)){
		$html .= "<option value=".$row["id"].">".$row["name"]."</option>";
	}
	 echo $html;die;
	}
?>

<!-- $html = '';
 $html .= "<option value ='0'>".$_POST['id']."</option>";
 $html .= "<option value ='1'>".$_POST['id']."</option>";
	echo $html;die; -->
