
<?php 
    require "connect.php";
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    session_start();

    if (( $_SESSION['role'] != 1) ) {
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Province</title>

    <link rel="shortcut icon" href="../image/province/avatar.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <link rel="stylesheet" type="text/css" href="../css/province.css">
</head>

<body>

    <?php include 'header.php'; ?>
    <div class="body">
        <div class="narbar">
            <?php include 'narbar.php'; ?>
        </div>
        <div class="main-content">
            <?php include 'menu.php'; ?>
            <!-- Form edit province -->
			<?php 
				require "connect.php";
				$id = $_GET['id'];

				if (isset($_POST['btnEdit'])) {
				$name=$_POST['name'];

				$sql="UPDATE `province` SET name='$name' WHERE id ='$id'";
				if (mysqli_query($conn, $sql)) {
				  header("location:indexprovince.php");
				} else {
				  echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
				}
				}

				$sql1 = "SELECT * FROM province WHERE id='$id'";
				$row = mysqli_query($conn, $sql1);
				$province = mysqli_fetch_assoc($row);
				// echo $province["id"], $province["name"];
				?>
			<form action="" method="POST" class="province">
				<div class="holder">
					<div class="form-row">
						<div class=" item form-group col-md-6">
							<label>ID:</label>
							<input type="text" class=" form-control" name="id" placeholder="Id auto increment- dont need type here" disabled="" value="<?php echo $province['id'] ?>">
						</div>
						<div class=" item form-group col-md-6">
							<label>Name:</label>
							<input type="text" class=" form-control" name="name" placeholder="Enter name of province ..." value="<?php echo $province['name'] ?>">
						</div>
					</div>
					
				<!-- END: Holder -->
				<button type="submit" class="btn btn-primary" name="btnEdit" style="margin-left:50%;">Edit</button>
				</div>	  
			</form>
            <!-- END: form edit province -->
        </div>
    </div>
    <div class="clear"></div>
    <?php include 'footer.php'; ?>
</body>
</html>
	

	
