<?php
require "connect.php";
session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
  header("location:index.php");
}
if (isset($_POST['btnLogin'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM account
          WHERE username = '$username'
          AND pass = '$password'
          AND role = '1';
          ";
  $result = mysqli_query($conn, $sql);
  // while($row = mysqli_fetch_array($result)){
  //       echo $row["username"];
  //     }
  $user = mysqli_fetch_assoc($result);
  if ($user) {
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['id_user'] = $user['id'];
    header("location:index.php");
  }else{
    // echo "<script>altr('Thông tin tài khoản hoặc mật khẩu chưa chính xác!');</script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login to Employee</title>
<link rel="shortcut icon" href="../image/employee/avatar.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1-dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
  <form action="" method="post" class="login">
    <div class="form-group">
      <label class="label">Username :</label>
      <div class="input-group ">
        <input type="text" class="form-control item" placeholder="Tên tài khoản" name="username" autofocus>
      </div>
    </div>
    <div class="form-group ">
      <label class="label">Password :</label>
      <div class="input-group ">
        <input type="password" class="form-control item" placeholder="*********" name="password">
      </div>
    </div>
    <div class="form-group ">
      <div class="form-check ">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input " checked> Lưu tài khoản
        </label>
      </div>
    </div>
    <div class="form-group">
      <button class="btn btn-primary " name="btnLogin">Đăng nhập</button>
      <a href="../Home/create_account.php">bạn chưa có tài khoản? đăng ký ngay tại đây.</a>
    </div>
  </form>

</body>
</html>