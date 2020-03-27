
<?php
	// session_destroy();
    require "connect.php";
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    ob_start();
    session_start();
    if (isset($_SESSION['role'])) {
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create Account Employee</title>

    <link rel="shortcut icon" href="../image/district/avatar.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <link rel="stylesheet" type="text/css" href="../css/account.css">
        <link rel="stylesheet" type="text/css" href="../css/employee.css">
</head>

<body>

    <?php include 'header.php'; ?>
	<form action="" method="POST" class="infor-employee" enctype="multipart/form-data">
		<div class="holder">
		<div class="infor-top">
			<div class="avata">
				<img src="../image/employee/avatar.png" alt="Anh dai dien">
				<!-- <input type="file" placeholder="Choose a file" name="fileToUpload"> -->
			</div>
			<div class="infor">
				<div class="form-row">
					<div class=" item form-group col-md-6">
						<label>ID:</label>
						<input type="text" class=" form-control" name="id" placeholder="Id auto increment- dont need type here" disabled="">
					</div>
					<div class=" item form-group col-md-6">
						<label>Name:</label>
						<input type="text" class=" form-control" name="name" placeholder="Enter your name ..." >
					</div>
				</div>

				<div class="form-row">
					<div class=" item form-group col-md-6">
						<label>Phone:</label>
						<input type="number" class=" form-control" name="phone" placeholder="Phone ...">
					</div>
					<div class=" item form-group col-md-6">
						<label for="inputPassword4">Email:</label>
						<input type="email" class=" form-control" name="email" placeholder="Email ..." >
					</div>
				</div>
				
				<div class="form-row">
					<div class=" item form-group col-md-6">
						<label>Salory:</label>
						<input type="number" class=" form-control" name="salory" placeholder="Salory ...">
					</div>
					<div class=" item form-group col-md-6">
						<label >Birthday: </label>
						<input type="date" class=" form-control" name="birthday" placeholder="Birthday ..." >
					</div>
				</div>

				<div class="form-row">
					<div class=" item form-group col-md-6">
						<label >Address:</label>
						<input type="text" class=" form-control" name="address" placeholder="Address ..." >
					</div>
					<div class="form-group col-md-3">
						<label >Province:</label>
						<select class="form-control" name="province_id" class="province_id" id="province_id" >
							<?php
							include_once("connect.php");
							$sql = "SELECT `id`,`name` FROM `province`;";
							$result = mysqli_query($conn,$sql);
							if (!$result) {
								die("Không thể thực hiện câu lệnh SQL: " . mysqli_error($conn));
								exit();
							}
							while($row = mysqli_fetch_array($result)){
								echo "<option value=".$row["id"].">".$row["name"]."</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group col-md-3">
						<label >Distristict:</label>
						<select class="form-control" name="distristict_id" id="distristict_id">
							
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>

	<!-- Infor bottom -->
		<div class="infor-bottom holder">
		 	<div class="infor-user col-md-7">
				<div class="form-row">
					<div class=" item form-group col-md-6">
						<label>Username:</label>
						<input type="text" class=" form-control" name="username" placeholder="Enter name of account ...">
					</div>
					<div class=" item form-group col-md-6">
						<label>Password:</label>
						<input type="text" class=" form-control" name="password" placeholder="Enter name of account ...">
					</div>
				</div>
				<div class="form-row">
					<div class=" item form-group col-md-6">
						<label>Role:</label>
						<input type="text" class=" form-control" name="role" placeholder="Enter name of account ...">
					</div>
					<div class=" item form-group col-md-6">
						<label>Token:</label>
						<input type="text" class=" form-control" name="token" placeholder="Enter name of account ...">
					</div>
				</div>
		 	</div>
		 	<div class="connect col-md-4">
					<h3 class="display-3">Connect us: </h3>
					<ul class="clearfix">
						<li><a href="#"><i class="fab fa-facebook-f"></i>Quản lý nhân sự fanpage</a></li>
						<li><a href="#"><i class="fab fa-youtube"></i>Quản lý nhân sự channal</a></li>
						<li><a href="mailto:dattran0319@gmail.com"><i class="far fa-envelope-open"></i>dattran0319@gmail.com</a></li>
						<li><a href="tel:01242703621"><i class="fas fa-phone"></i>01242703621</a></li>
					</ul>
		 	</div>
		 </div>
		 <div class="clear"></div>
		 <button type="submit" class="btn btn-primary" name="submit" style="margin-left:30%;">Create</button>
	 <!-- END: Holder -->
	 </div>	  
	</form>
	<!-- Insert account -->
		<?php 
			require "connect.php";

			if (isset($_POST['submit'])) {
			$username=$_POST['username'];
			$password=$_POST['password'];
			$role=$_POST['role'];
			$token=$_POST['token'];

			$sql0="INSERT INTO `account` (`username`, `pass`, `role`, `token`) VALUES ( ' ".$username." ', ' ".$password." ', ".$role." , ".$token.") ;";
			if (mysqli_query($conn, $sql0)) {
			} else {
			  echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
			}
			}
		?>
	<!-- Insert employee -->
	<?php
	if(isset($_POST['submit'])){
		$sql1 = "SELECT id,username,pass,role,token FROM account WHERE `account`.`username`=' ".$username." ' AND
		 `account`.`pass`=' ".$password." ' AND `account`.`role`=' ".$role." ';";
            $result1 = mysqli_query($conn,$sql1);
            if (!$result1) {
                    die("Không thể thực hiện câu lệnh SQL: " . mysqli_error($conn));
                    exit();
                }
            while($row1 = mysqli_fetch_array($result1)){
            	$account_id=$row1["id"];
            }
		
			// $avata=$_POST['fileToUpload'];
			$name=$_POST['name'];
			$birthday=$_POST['birthday'];
			$province_id=$_POST['province_id'];
			$distristict_id=$_POST['distristict_id'];
			$address=$_POST['address'];
			$phone=$_POST['phone'];
			$email=$_POST['email'];
			$salory=$_POST['salory'];

			$sql2="INSERT INTO `employee` ( `name`, `birthday`, `province_id`,`distristict_id`, `address`, `phone`, `email`,
			 `salory`, `account_id`, `url`) VALUES (' ".$name." ',".$birthday.",".$province_id.",".$distristict_id.",' ".$address." ',".$phone.",
			 ' ".$email." ',".$salory.",".$account_id.",NULL) ;";
			$result2 = mysqli_query($conn,$sql2);
			if(!$result2){
				echo "Lỗi: " . $sql2 . "<br>" . mysqli_error($conn);
			}
			header("location: login.php");
		}
		include_once("endconnect.php");
	?>
	<script type="text/javascript">
			$(document).ready(function(){
				$('#province_id').change(function(){
					// console.log(111);
					var province_id=$(this).val();
					   $.ajax({
		                url: 'abc.php',
		                type: 'POST',
		                dataType: 'html',
		                data: {
		                    id: province_id
		                }
			            }).done(function(res) {
			                if(res != ''){
			                	$('#distristict_id').html(res);
			                }
			            });
				});
			});
		</script>
	<!-- Upload file -->
	<?php
	if(isset($_POST['submit'])){
		$target_dir = "../image/avata/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 50000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
	}
	?>
<?php include 'footer.php'; ?>
</body>
</html>