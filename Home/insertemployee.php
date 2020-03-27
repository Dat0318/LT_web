
<?php 
    require "connect.php";
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    ob_start();
    session_start();

    if (($_SESSION['username'] != "admin" || $_SESSION['role'] != 1) ) {
    	$_SESSION['error']="Bạn không có quyền thực hiện hành động này!";
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Insert Employee</title>

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
            <!-- Form insert employee -->
            <form action="" method="POST" class="infor-employee" enctype="multipart/form-data">
				<div class="holder">
					<div class="infor-top">
						<div class="avata">
							<img src="../image/employee/avatar.png" alt="Anh dai dien">
							<input type="file" placeholder="Choose a file" name="fileToUpload">
						</div>
						<div class="infor">
							<div class="form-row">
								<div class=" item form-group col-md-6">
									<label>Name:</label>
									<input type="text" class=" form-control" name="name" placeholder="Enter your name ..." >
								</div>
								<div class=" item form-group col-md-6">
									<label>Phone</label>
									<input type="number" class=" form-control" name="phone" placeholder="Phone ...">
								</div>
							</div>

							<div class="form-row">
								<div class=" item form-group col-md-6">
									<label for="inputPassword4">Email</label>
									<input type="email" class=" form-control" name="email" placeholder="Email ..." >
								</div>
								<div class=" item form-group col-md-6">
									<label>Salory</label>
									<input type="number" class=" form-control" name="salory" placeholder="Salory ...">
								</div>
							</div>

							<div class="form-row">
								<div class=" item form-group col-md-6">
									<label >Address</label>
									<input type="text" class=" form-control" name="address" placeholder="Address ..." >
								</div>
								<div class="form-group col-md-3">
									<label >Province</label>
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
									<label >Distristict</label>
									<select class="form-control" name="distristict_id" id="distristict_id">
										
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class=" item form-group col-md-6">
									<label >Birthday: </label>
									<input type="date" class=" form-control" name="birthday" placeholder="Birthday ..." >
								</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					<!-- END: Holder -->
					<button type="submit" class="btn btn-primary" name="submit" style="margin-left:50%;">Insert</button>	
				</div>  
			</form>

			<?php
				include("uploadfile.php");
				if(uploadfile()==1){
					// echo 'LT_web/image/avata/' . $_FILES["fileToUpload"]["name"];
					// print_r($_SERVER);
				include_once("connect.php"); 	
				if(isset($_POST['submit'])){
					$avata= '../image/avata/' . $_FILES["fileToUpload"]["name"];
					$name=$_POST['name'];
					$birthday=$_POST['birthday'];
					$province_id=$_POST['province_id'];
					$distristict_id=$_POST['distristict_id'];
					$address=$_POST['address'];
					$phone=$_POST['phone'];
					$email=$_POST['email'];
					$salory=$_POST['salory'];

					$sql5="INSERT INTO `employee` ( `name`, `birthday`, `province_id`,`distristict_id`, `address`, `phone`, `email`,
					 `salory`,`url`) VALUES (' ".$name." ',".$birthday.",".$province_id.",".$distristict_id.",' ".$address." ',".$phone.",
					 ' ".$email." ',".$salory.",' ".$avata." ') ;";
					$result5 = mysqli_query($conn,$sql5);
					if(!$result5){
						echo "Lỗi: " . $sql5 . "<br>" . mysqli_error($conn);
					}
					header("location:index.php");
				}
				include_once("endconnect.php");
				}else{
				}
			?>
		</body>

		<script type="text/javascript">
			$(document).ready(function(){
				$('#province_id').change(function(){
					console.log(111);
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
			<!-- END: form insert employee -->
        </div>
    </div>
    <div class="clear"></div>

    <?php include 'footer.php'; ?>
</body>
</html>
