
<?php 
    require "connect.php";
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    ob_start(); 
    session_start();

    if (($_SESSION['username'] != "admin" || $_SESSION['role'] != 1) ) {
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Employee</title>

    <link rel="shortcut icon" href="../image/employee/avatar.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <link rel="stylesheet" type="text/css" href="../css/employee.css">
</head>

<body>

    <?php include 'header.php'; ?>
    <div class="body">
        <div class="narbar">
            <?php include 'narbar.php'; ?>
        </div>
        <div class="main-content">
            <?php include 'menu.php'; ?>
            <!-- Form edit employee -->
			<?php
				include("uploadfile.php");
				$id = $_GET['id'];
				echo $id;
			if(uploadfile()==1){
				echo "true";
					// echo 'LT_web/image/avata/' . $_FILES["fileToUpload"]["name"];
					// print_r($_SERVER); 
				require "connect.php";
				

				if (isset($_POST['submit'])) {
					$name=$_POST['name'];
					$birthday=$_POST['birthday'];
					$province_id=$_POST['province_id'];
					$address=$_POST['address'];
					$phone=$_POST['phone'];
					$email=$_POST['email'];
					$salory=$_POST['salory'];
					$url='../image/avata/' . $_FILES["fileToUpload"]["name"];

					$sql="UPDATE `employee` SET name='$name', birthday='$birthday', province_id='$province_id', address='$address', phone='$phone', email = '$email', salory='$salory', url='$url' WHERE id ='$id'";
					if (mysqli_query($conn, $sql)) {
					  // header("location:index.php");
					}else {
					  echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
					}
				}
			}else{
				echo "false";

				if (isset($_POST['submit'])) {
				$name=$_POST['name'];
				$birthday=$_POST['birthday'];
				$province_id=$_POST['province_id'];
				$address=$_POST['address'];
				$phone=$_POST['phone'];
				$email=$_POST['email'];
				$salory=$_POST['salory'];

				$sql="UPDATE `employee` SET name='$name', birthday='$birthday', province_id='$province_id', address='$address', phone='$phone',email = '$email', salory='$salory' WHERE id ='$id'";
				echo $sql;
				if (mysqli_query($conn, $sql)) {
				  // header("location:index.php");
				}else {
				  echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
				}
				}
			}
				$sql1 = "SELECT * FROM employee WHERE id='$id' ";
				$row = mysqli_query($conn, $sql1);
				$employee = mysqli_fetch_assoc($row);
				?>
				<form action="" method="POST" class="infor-employee" enctype="multipart/form-data">
					<div class="holder">
					<div class="infor-top">
					<div class="avata">
						<img src="<?php echo $employee['url'] ?>" alt="Anh dai dien">
						<input type="file" placeholder="Choose a file"
						value="<?php echo $employee['url'] ?>" name="fileToUpload">
					</div>
					<div class="infor">
						<div class="form-row">
						    <div class=" item form-group col-md-6">
						      <label>Name:</label>
						      <input type="text" class=" form-control" name="name" placeholder="Enter your name ..."
						      value="<?php echo $employee['name'] ?>">
					<!-- not value name -->
						    </div>
						    <div class=" item form-group col-md-6">
						      <label>Phone</label>
						      <input type="number" class=" form-control" name="phone" placeholder="Phone ..."
						      value="<?php echo $employee['phone'] ?>">		      		
						    </div>
						</div>

						<div class="form-row">
						    <div class=" item form-group col-md-6">
						      <label for="inputPassword4">Email</label>
						      <input type="email" class=" form-control" name="email" id placeholder="Email ..."
						      value="<?php echo $employee['email'] ?>">
						    </div>
						    <div class=" item form-group col-md-6">
						      <label>Salory</label>
						      <input type="number" class=" form-control" name="salory" placeholder="Salory ..." value="<?php echo $employee['salory'] ?>">
						    </div>
						</div>

						<div class="form-row">
						    <div class=" item form-group col-md-6">
						      <label >Address</label>
						      <input type="text" class=" form-control" name="address" id placeholder="Address ..."
						      value="<?php echo $employee['address'] ?>">
						    </div>
						    <div class="form-group col-md-3">
							    <label >Province</label>
							    <select class="form-control" name="province_id" >
							    	<option value="<?php echo $employee['province_id'] ?>">
							    		<?php
							    			$sql0 = "SELECT `name` FROM `province` WHERE  `province`.`id`=".$employee['province_id'].";";
											$result0 = mysqli_query($conn,$sql0);
											while($row0 = mysqli_fetch_array($result0)){
												echo $row0["name"];
											}
										 ?>
							    	</option>
							    </select>
						    </div>
						    <div class="form-group col-md-3">
							    <label >Distristict</label>
							    <select class="form-control" name="distristict_id" >
							    	<option value="<?php echo $employee['distristict_id'] ?>">
							    		<?php
							    			$sql0 = "SELECT `name` FROM `distristict` WHERE  
							    			`distristict`.`id`=".$employee['distristict_id'].";";
											$result0 = mysqli_query($conn,$sql0);
											while($row0 = mysqli_fetch_array($result0)){
												echo $row0["name"];
											}
										 ?>
							    	</option>
							    </select>
						    </div>
						</div>
						<div class="form-row">
							<div class=" item form-group col-md-6">
								<label >Birthday: </label>
								<input type="date" class=" form-control" name="birthday" placeholder="Birthday ..." 
								value="<?php echo $employee['birthday'] ?>" >
							</div>
						</div>
					</div>
					</div>
					<div class="clear"></div>
					<!-- END: Holder -->
					<button type="submit" class="btn btn-primary" name="submit" style="margin-left:50%;">Edit</button>
				</div>	  
			</form>
            <!-- END: form edit employee -->
        </div>
    </div>
    <div class="clear"></div>
    <?php include 'footer.php'; ?>
</body>
</html>