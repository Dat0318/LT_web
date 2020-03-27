
    <link rel="stylesheet" type="text/css" href="../css/account.css">

    <div class="holder list-account">
        <h2>LIST ACCOUNT</h2>
        <div class="create-account">
            <a href="insertaccount.php"><div class="btn btn-primary"><i class="fas fa-user-plus"></i></div></a>
        </div>
        <table class="table-account" border="1" cellspacing="0px" cellpadding="0px">
            <tr>
                <th class="first">ID</th>
                <th>USER NAME</th>
                <th>PASS</th>
                <th>ROLE</th>
                <th>TOKEN</th>
                <th  class="action" colspan="2">TAC VU</th>
            </tr>
            <?php
            include_once("connect.php");
            $sql = "SELECT id,username,pass,role,token FROM account";
            $result = mysqli_query($conn,$sql);
            if (!$result) {
                    die("Không thể thực hiện câu lệnh SQL: " . mysqli_error($conn));
                    exit();
                }
            while($row = mysqli_fetch_array($result)){
                    echo "<tr >";
                        echo "<td >".$row["id"]."</td>";
                        echo "<td>".$row["username"]."</td>";
                        echo "<td>".$row["pass"]."</td>";
                        echo "<td>".$row["role"]."</td>";
                        echo "<td>".$row["token"]."</td>";
                        echo ' <td><a href="../Home/editaccount.php?id='.$row["id"].'" class=" item btn btn-primary"><i class="fas fa-edit"></i></a></td> ';
                        echo ' <td><a href="../Home/deleteaccount.php?id='.$row["id"].'" class=" item btn btn-primary"><i class="fas fa-trash-alt"></i></a></td> ';
                    echo "</tr>";
                }
            ?>
            </table>
    </div>
<?php 
    include_once("endconnect.php");
 ?>
