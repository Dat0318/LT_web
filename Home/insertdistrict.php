

<?php 
    require "connect.php";
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    ob_start();
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
    <title>Insert district</title>

    <link rel="shortcut icon" href="../image/employee/avatar.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <link rel="stylesheet" type="text/css" href="../css/district.css">
</head>

<body>

    <?php include 'header.php'; ?>
    <div class="body">
        <div class="narbar">
            <?php include 'narbar.php'; ?>
        </div>
        <div class="main-content">
            <?php include 'menu.php'; ?>
            <!-- Form insert district -->
        	<form action="" method="POST" class="district">
                <div class="holder">
                    <div class="form-row">
                        <div class=" item form-group col-md-6">
                            <label>ID:</label>
                            <input type="text" class=" form-control" name="id" placeholder="Id auto increment- dont need type here" disabled="" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class=" item form-group col-md-6">
                            <label>Name:</label>
                            <input type="text" class=" form-control" name="name" placeholder="Enter name of district ...">
                        </div>
                        <div class=" item form-group col-md-6">
                            <label>Province:</label>
                            <select class="form-control" name="province_id" class="province_id" id="province_id" >
                                <?php
                                include_once("connect.php");                                    
                                $sql3 = "SELECT `id`,`name` FROM `province`;";
                                $result3 = mysqli_query($conn,$sql3);
                                if (!$result3) {
                                    die("Không thể thực hiện câu lệnh SQL: " . mysqli_error($conn));
                                    exit();
                                }
                                while($row3 = mysqli_fetch_array($result3)){
                                    echo "<option value=".$row3["id"].">".$row3["id"].": ".$row3["name"]."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                <!-- END: Holder -->
                <button type="submit" class="btn btn-primary" name="submit" style="margin-left:50%;">Insert</button>
                </div>    
            </form>

				<?php
				include_once("connect.php");
				if(isset($_POST['submit'])){
					$name=$_POST['name'];
                    $province_id=$_POST['province_id'];

					$sql="INSERT INTO `distristict` (`name`, `province_id`) VALUES ( ' ".$name." ', ".$province_id.") ;";
					$result = mysqli_query($conn,$sql);
					if(!$result){
						echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
					}

					header('Location: indexdistrict.php');
                    exit;
				}
				include_once("endconnect.php");
			?>
			<!-- END: form insert district -->
        </div>
    </div>
    <div class="clear"></div>

    <?php include 'footer.php'; ?>
</body>
</html>

