
<link rel="stylesheet" type="text/css" href="../css/narbar.css">
<div class="narbar-content">
	<div class="infor-user">
		<?php
					if (isset($_SESSION['id_user'])){
						// echo $_SESSION['id_user'];
						include_once("connect.php");
						$sql = "SELECT `name`,`url` FROM `employee` WHERE `employee`.`account_id`= ".$_SESSION['id_user'].";";
						$result = mysqli_query($conn,$sql);
						if (!$result) {
							die("Không thể thực hiện câu lệnh SQL: " . mysqli_error($conn));
							exit();
						}
						while($row = mysqli_fetch_array($result)){
							echo $row["name"];
							echo "<img src=".$row["url"].">";
						}	
					} // end if
				 ?>
	      	</h4>
	      	
	</div>
	<div class="clear"></div>
	<ul class="clearfix">
		<li><a href="../Home/index.php"><i class="fas fa-users"></i>Employee</a></li>
		<li class="narbar-account clearfix"><i class="fas fa-user-circle"></i>Account<i style="margin-left:60px;" class="fas fa-sort-down"></i></li>
			<script>
				$(document).ready(function(){
				  $(".narbar-account").click(function(){
				    $(".sub-narbar-account").fadeToggle();
				  });
				});
				</script>
		<li class="sub-narbar-account "><a href="../Home/indexaccount.php"><i class="fas fa-list"></i>List</a></li>
		<li class="sub-narbar-account "><a href="../Home/insertaccount.php"><i class="fas fa-plus-circle"></i>Add</a></li>
		<li class="narbar-address clearfix"><i class="fas fa-map-marked-alt"></i>Address<i style="margin-left:60px;" class="fas fa-sort-down"></i></li>
			<script>
				$(document).ready(function(){
				  $(".narbar-address").click(function(){
				    $(".sub-narbar-address").fadeToggle();
				  });
				});
				</script>
		<li class="sub-narbar-address"><a href="../Home/indexprovince.php"><i class="fas fa-place-of-worship"></i>Province</a></li>
		<li class="sub-narbar-address"><a href="../Home/indexdistrict.php"><i class="fas fa-map-marker"></i>District</a></li>
	</ul>
</div>