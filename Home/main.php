
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">

	<div class="holder list-employee">
		<h2>LIST EMPLOYEE</h2>
		<div class="create-employee">
			<a href="insertemployee.php"><div class="btn btn-primary"><i class="fas fa-user-plus"></i></div></a>
		</div>
		<table class="table-employee" border="1" cellspacing="0px" cellpadding="0px">
			<tr>
				<th class="first">ID</th>
				<th>NAME</th>
				<th>AVATAR</th>
				<th>BIRTHDAY</th>
				<th>ADDRESS</th>
				<th>PHONE</th>
				<th class="email">EMAIL</th>
				<th>SALARY</th>
				<th  class="action" colspan="2">TAC VU</th>
			</tr>
			<?php
			include_once("connect.php");
			$sql = "SELECT id,name,birthday,address,phone,email,salory,url FROM employee";
			$result = mysqli_query($conn,$sql);
			if (!$result) {
				    die("Không thể thực hiện câu lệnh SQL: " . mysqli_error($conn));
				    exit();
				}
			while($row = mysqli_fetch_array($result)){
					echo "<tr >";
						echo "<td >".$row["id"]."</td>";
						echo "<td>".$row["name"].$row["url"]."</td>";
						echo "<td><img src=" .$row["url"]." ></td>";
						// echo "<td> <img src=' ".$row["url"]." ' alt='avata nhan vien' class='avata'></td>";
						echo "<td >".$row["birthday"]."</td>";
						echo "<td >".$row["address"]."</td>";
						echo "<td >".$row["phone"]."</td>";
						echo "<td >".$row["email"]."</td>";
						echo "<td >".$row["salory"]."</td>";
						echo ' <td><a href="../Home/editemployee.php?id='.$row["id"].'" class=" item btn btn-primary"><i class="fas fa-edit"></i></a></td> ';
						echo ' <td><a href="../Home/deleteemployee.php?id='.$row["id"].'" class=" item btn btn-primary"><i class="fas fa-trash-alt"></i></a></td> ';
					echo "</tr>";
				}
			?>
			</table>
	</div>
<?php 
	include_once("endconnect.php");
 ?>