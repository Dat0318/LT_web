
	<title>Header</title>
	<link rel="stylesheet" href="../css/header.css">
	<div class=" header">
		<div class="avata-header">
			<a href="../Home/index.php"><img src="../image/employee/logo.png" alt=""></a>
		</div>
		<div class="search">
			<form action="" method="post">
			<div class="form-group" style="">
		        <input type="text" name="name" id="search_name" class="form-control" style="width: 500px;"
		          placeholder="Tìm kiếm nhân viên theo tên" autocomplete="off" >
	        <div class="result"></div>
	      </div>
		</form>
		</div>
		<div class="infor-user">
	      	<h4>Hello,
				<?php
					if (isset($_SESSION['id_user'])){
						// echo $_SESSION['id_user'];
						include_once("connect.php");
						$sql0 = "SELECT `username` FROM `account` WHERE `account`.`id`= ".$_SESSION['id_user'].";";
						$result0 = mysqli_query($conn,$sql0);
						if (!$result0) {
							die("Không thể thực hiện câu lệnh SQL: " . mysqli_error($conn));
							exit();
						}
						while($row0 = mysqli_fetch_array($result0)){
							echo $row0["username"].": ";
						}
							
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
	      	<a href="../Home/logout.php">Logout!</a>
	    </div>
	</div>
	<div class="clear"></div>
<script>
	$(document).ready(function(){
	  $('body').on('keyup', '#search_name' ,function(){
	    var name = $(this).val();
	    if(name != ""){
	      $.post('search.php', {name: name}, function(data){
	      	if (data) {
	      		$('.result').html(data).show();
	      	} else {
	      		$('.result').html('').hide();
	      	}
	    });
	  }else{
	      $('.result').html('').hide();
	  }
	});
	});
</script>

<!-- Pop UP -->

<?php if(isset($_SESSION['error'])){?>
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Error Activity: </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <?php echo $_SESSION['error'];?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger close" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<?php
	// remove($_SESSION['error']);
    }
?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".close").click(function(){
            $("#myModal").hide();
            <?php unset($_SESSION['error']);?>
        });
    });
</script>