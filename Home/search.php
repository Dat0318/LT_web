<link rel="stylesheet" type="text/css" href="">
<?php
  require "connect.php";
  $name = $_POST['name'];
  $sql = "SELECT id, name FROM employee
         WHERE name LIKE '%$name%'";
  $employee = mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_assoc($employee)) {
    echo "<p>ID: ".$row['id']." - ".$row['name']."</p>";
  }

?>