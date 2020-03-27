
    <link rel="stylesheet" type="text/css" href="../css/dictrict.css">

    <div class="holder list-district">
        <h2>LIST DISTRICT</h2>
        <div class="create-district">
            <a href="insertdistrict.php"><div class="btn btn-primary"><i class="fas fa-user-plus"></i></div></a>
        </div>
        <table class="table-district" border="1" cellspacing="0px" cellpadding="0px">
            <tr>
                <th class="first">ID</th>
                <th>NAME</th>
                <th>PROVINCE</th>
                <th  class="action" colspan="2">TAC VU</th>
            </tr>
            <?php
            include_once("connect.php");
            $sql = "SELECT id,name,province_id FROM distristict";
            $result = mysqli_query($conn,$sql);
            if (!$result) {
                    die("Không thể thực hiện câu lệnh SQL: " . mysqli_error($conn));
                    exit();
                }
            while($row = mysqli_fetch_array($result)){
                // Get province name
                    $sql2 = "SELECT `id`,`name` FROM `province`
                            where`province`.`id`=' ".$row["province_id"]." ';";
                    $result2 = mysqli_query($conn,$sql2);
                    $row2 = mysqli_fetch_array($result2,true);
                // END: Get province name
                    echo "<tr >";
                        echo "<td >".$row["id"]."</td>";
                        echo "<td>".$row["name"]."</td>";
                        // echo "<td>".$row["province_id"]."</td>";
                        echo "<td>".$row2["id"].": ".$row2["name"]."</td>";
                        echo ' <td><a href="../Home/editdistrict.php?id='.$row["id"].'" class=" item btn btn-primary"><i class="fas fa-edit"></i></a></td> ';
                        echo ' <td><a href="../Home/deletedistrict.php?id='.$row["id"].'" class=" item btn btn-primary"><i class="fas fa-trash-alt"></i></a></td> ';
                    echo "</tr>";
                }
            ?>
            </table>
    </div>
<?php 
    include_once("endconnect.php");
 ?>
