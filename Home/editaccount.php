
<?php 
    require "connect.php";
    date_default_timezone_set("Asia/Ho_Chi_Minh");
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
    <title>Edit Account</title>

    <link rel="shortcut icon" href="../image/account/avatar.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <link rel="stylesheet" type="text/css" href="../css/account.css">
</head>

<body>

    <?php include 'header.php'; ?>
    <div class="body">
        <div class="narbar">
            <?php include 'narbar.php'; ?>
        </div>
        <div class="main-content">
            <?php include 'menu.php'; ?>
            <!-- Form edit account -->
			<?php 
				require "connect.php";
				$id = $_GET['id'];

				if (isset($_POST['btnEdit'])) {
				$username=$_POST['username'];
				$password=$_POST['password'];
				$role=$_POST['role'];
				$token=$_POST['token'];

				$sql="UPDATE `account` SET username='$username',pass='$password',role='$role',token='$token' WHERE id ='$id'";
				if (mysqli_query($conn, $sql)) {
				  header("location:indexaccount.php");
				} else {
				  echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
				}
				}

				$sql1 = "SELECT * FROM account WHERE id='$id'";
				$row = mysqli_query($conn, $sql1);
				$account = mysqli_fetch_assoc($row);
				// echo $account["id"], $account["name"];
				?>
			<form action="" method="POST" class="account">
				<div class="holder">
					<div class="form-row">
						<div class=" item form-group col-md-6">
							<label>ID:</label>
							<input type="text" class=" form-control" name="id" placeholder="Id auto increment- dont need type here" disabled="" value="<?php echo $account['id'] ?>">
						</div>
					</div>
					<div class="form-row">
						<div class=" item form-group col-md-6">
							<label>Username:</label>
							<input type="text" class=" form-control" name="username" placeholder="Enter name of account ..." value="<?php echo $account['username'] ?>">
						</div>
						<div class=" item form-group col-md-6">
							<label>Password:</label>
							<input type="text" class=" form-control" name="password" placeholder="Enter name of account ..." value="<?php echo $account['pass'] ?>">
						</div>
					</div>
					<div class="form-row">
						<div class=" item form-group col-md-6">
							<label>Role:</label>
							<input type="text" class=" form-control" name="role" placeholder="Enter name of account ..." value="<?php echo $account['role'] ?>">
						</div>
						<div class=" item form-group col-md-6">
							<label>Token:</label>
							<input type="text" class=" form-control" name="token" placeholder="Enter name of account ..." value="<?php echo $account['token'] ?>">
						</div>
					</div>
				<!-- END: Holder -->
				<button type="submit" class="btn btn-primary" name="btnEdit" style="margin-left:50%;">Edit</button>
				</div>	  
			</form>
            <!-- END: form edit account -->
        </div>
    </div>
    <div class="clear"></div>
    <?php include 'footer.php'; ?>
</body>
</html>
	

	
