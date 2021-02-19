<?php
    include "../Database/database.php";
    session_start();
    if( isset($_SESSION['client']) && isset($_SESSION['my_orders'])){
        $re = 'cl'.$_SESSION['client'];
        $sql = "SELECT * FROM clientOrders WHERE userid = '$re'" ;
        $result =  mysqli_query($conn, $sql);

        if (  $result ){
            // echo "success";
            // unset($_POST);
        }

        // if the data with these EMP_IDNO already exists then do nothing
        else if ( mysqli_errno($conn) == 1062 ){
            echo "1062";
        }
        else{
            echo "<p>error</p> $sql." . mysqli_error($conn);
        }
        if (mysqli_num_rows($result) > 0) {
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>Document</title>
        <style>
            
        </style>
    </head>
    <body>
        <table class='table table-hover table-bordered table-dark'>
        
            <tr class="bg-info"> 
                <td>Name</td>
                <td>Address</td>
                <td>Phone</td>
                <td>Email</td>
                <td>Delivery Time</td>
                <td>Delivery Status</td>
                <td>Charges</td>
                <td>Remaining Dues</td>
            </tr>
        <?php
            $i = 0;
            while($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["address"]; ?></td>
            <td><?php echo $row["phone"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["deliveryTime"]; ?></td>
            <td><?php echo $row["deliveryStatus"]; ?></td>
            <td><?php echo $row["charges"]; ?></td>
            <td><?php echo $row["remainingDues"]; ?></td>
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
        }
    ?>
    </body>
    </html>
