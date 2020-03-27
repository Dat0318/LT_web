
    <link rel="stylesheet" type="text/css" href="../css/province.css">

    <div class="holder list-province">
        <h2>LIST PROVINCE</h2>
        <div class="create-province">
            <a href="insertprovince.php"><div class="btn btn-primary"><i class="fas fa-user-plus"></i></div></a>
        </div>
        <table class="table-province" border="1" cellspacing="0px" cellpadding="0px">
            <tr>
                <th class="first">ID</th>
                <th>NAME</th>
                <th  class="action" colspan="2">TAC VU</th>
            </tr>
            <?php
            include_once("connect.php");
            $sql = "SELECT id,name FROM province";
            $result = mysqli_query($conn,$sql);
            if (!$result) {
                    die("Không thể thực hiện câu lệnh SQL: " . mysqli_error($conn));
                    exit();
                }
            while($row = mysqli_fetch_array($result)){
                    echo "<tr >";
                        echo "<td >".$row["id"]."</td>";
                        echo "<td>".$row["name"]."</td>";
                        echo ' <td><a href="../Home/editprovince.php?id='.$row["id"].'" class=" item btn btn-primary"><i class="fas fa-edit"></i></a></td> ';
                        echo ' <td><a href="../Home/deleteprovince.php?id='.$row["id"].'" class=" item btn btn-primary"><i class="fas fa-trash-alt"></i></a></td> ';
                    echo "</tr>";
                }
            ?>
            </table>
    </div>
<?php 
    include_once("endconnect.php");
 ?>
