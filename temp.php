<?php
        // include "./Database/database.php";
        $result = mysqli_query($conn, "SELECT * FROM inventory" );
        if (mysqli_num_rows($result) > 0) {
    ?>
    <table class='table table-bordered table-striped'>
        <tr> 
            <td>id</td>
            <td>Name</td>
            <td>type</td>
            <td>manf</td>
            <td>number</td>
            <td>price</td>
            <td>Action</td>
        </tr>
    <?php
        $i = 0;
        while($row = mysqli_fetch_array($result)) {
    ?>
    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["type"]; ?></td>
        <td><?php echo $row["manufacturer"]; ?></td>
        <td><?php echo $row["countDrugs"]; ?></td>
        <td><?php echo $row["price"]; ?></td>
        <td><a href="update.php?drugid=$row['id']" class="btn btn-primary">Edit</a>
            <a href="#" class = "btn btn-warning">Delete</a>
        </td>
    </tr>
    <?php
        $i++;
        }
    ?>
    </table>
    <?php
        }
        else{
            echo "No result found";
        }
    ?>

<?php
        $sql="INSERT INTO inventory(name, type, manufacturer, countDrugs, price) VALUES (?, ?, ?, ?, ?)";

        if (isset($_POST['addmed'])){
    
            // binding the params with stmt
            if ( $stmt = mysqli_prepare($conn, $sql) ){
                mysqli_stmt_bind_param($stmt, "ssssd", $name, $type, $manufacturer, $quantity, $price);
    
                // if the data for every key is set then get that data otherwise do nothing
                $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
                $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : '';
                $manufacturer = isset($_REQUEST['manufacturer']) ? $_REQUEST['manufacturer'] : '';
                $quantity = isset($_REQUEST['countDrugs']) ? $_REQUEST['countDrugs'] : '';
                $price = isset($_REQUEST['price']) ? $_REQUEST['price'] : '';
    
                // error handling
                if ( mysqli_stmt_execute($stmt) ){
                    echo "<p>success</p>";
                }
    
                // if no data in key or undefined key index then do nothing (solved with isset above)
                else if ( mysqli_errno($conn) == 1048 ){
                    echo "";
                }
                else{
                    echo "<p>error</p> $sql.". mysqli_errno($conn);
                }
            }
    
            else{
                echo "<p>error</p> $sql." . mysqli_error($conn);
            }
    
            // $sql = "SELECT id FROM clients ORDER BY id DESC LIMIT 1";
            // $id = mysqli_query($conn, $sql);
            // $row=mysqli_fetch_assoc($id);
            // $id=$row['id'];
            // session_start();
            // $_SESSION['client'] = $id;
            // header("Location: http://localhost/phppractice/project%20structure/index.php");
        }
    
        else{
            echo "no entry";
        }
    ?>