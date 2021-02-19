<?php
    include "../Database/database.php";
    session_start();
    if(isset($_POST['submit'])&&isset($_SESSION['client'])){
        $sample = "SELECT id FROM clientOrders ORDER BY id DESC LIMIT 1";
        $curr = date('y')."-".date('m')."-";
        $curr.=date('d') + 2;
        // echo $curr;
        $userid='cl'.$_SESSION['client'];
        if ( !mysqli_query($conn, $sample)){
            $id = 1;
        }
        else{
            $row=mysqli_query($conn, $sample);
            $row=mysqli_fetch_assoc($row);
            $id = $row['id'];
            $id++;
        }
        $sql="INSERT into clientOrders(id, name, userid, address, phone, email, deliveryTime, deliveryStatus, charges,
        remainingDues) Values('$id','$_POST[name]','$userid','$_POST[address]','$_POST[phone]','$_POST[email]','$curr','pending','$_SESSION[price]','$_SESSION[clientRemain]')";

        if ( mysqli_query($conn, $sql) ){
            // echo "success";
            unset($_POST);
        }

        // if the data with these EMP_IDNO already exists then do nothing
        else if ( mysqli_errno($conn) == 1062 ){
            echo "1062";
        }
        else{
            echo "<p>error</p> $sql." . mysqli_error($conn);
        }

    }    


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
        body{
            margin-top: 30px;
            background: rgb(51,200,91);
            background: linear-gradient(90deg, rgba(51,200,91,1) 0%, rgba(122,201,142,1) 35%, rgba(96,126,151,1) 57%, rgba(55,160,181,1) 100%);
            background-repeat:no-repeat;
            background-size:auto;
            height:100vh;
        }
        .table-info{
            color: black;
        }
    </style>
</head>
<body>

    <?php
        $result = mysqli_query($conn, "SELECT * FROM clientOrders WHERE id = '$id'" );
        if (mysqli_num_rows($result) > 0) {
    ?>

    <table class='table table-hover table-bordered table-dark'>
        
        <tr class="table-active"> 
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
    <tr class="bg-danger">
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
        header("Refresh:5; url=http://localhost/phppractice/project%20structure/index.php");
        }
        else{
            echo "No result found";
        }
    ?>

</body>
</html>
