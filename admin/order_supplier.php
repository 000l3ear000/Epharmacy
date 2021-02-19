<?php
    
    session_start();

    if(isset($_SESSION['order_supplier'])){
        include "../Database/database.php";
        if(isset($_POST['del'])){
            $id=$_POST['id'];
            $sql="delete from supply_orders where id=$id";
            if(mysqli_query($conn,$sql)){
                // echo "success";
                unset($_POST);
            }
            else if ( mysqli_errno($conn) == 1062 ){
                echo "1062";
            }
            else{
                echo "<p>error</p> $sql." . mysqli_error($conn);
            }
            
        }
        if (isset($_POST['submit'])){
            $sample = "SELECT id FROM supply_orders ORDER BY id DESC LIMIT 1";
            if ( !mysqli_query($conn, $sample)){
                $id = 1;
            }
            else{
                $row=mysqli_query($conn, $sample);
                $row=mysqli_fetch_assoc($row);
                $id=$row['id'];
                $id++;
            }
            
            $sql = "INSERT INTO supply_orders (id, supplierName, type, manufName, quantity) VALUES ($id, '$_POST[name]','$_POST[type]','$_POST[manu]','$_POST[quantity]')";
            
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
            margin-top: 20px;
            background: rgb(131,58,180); 
            background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(0,255,179,1) 0%, rgba(69,229,252,1) 86%);
            background-repeat:no-repeat;
            background-size:auto;
            height:100vh;
        }
        .main-links{
            display:flex;
            width:100%;
            align-items:space-around;
            justify-content:center;    
            margin-top: 20px;
            margin-bottom:20px;
            padding-bottom:20px;
            border-bottom:1px solid black;
        }
        .main-links input{
            margin-right: 10px;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>

    <?php
        $result = mysqli_query($conn, "SELECT * FROM supply_orders ORDER BY id ASC" );
        if (mysqli_num_rows($result) > 0) {
    ?>

    <table class='table table-bordered table-striped'>
        <tr> 
            <td>id</td>
            <td>Name</td>
            <td>type</td>
            <td>manf</td>
            <td>quantity</td>
            <td>timestamp</td>
            <td>Action</td>
        </tr>
    <?php
        $i = 0;
        while($row = mysqli_fetch_array($result)) {
    ?>
    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["supplierName"]; ?></td>
        <td><?php echo $row["type"]; ?></td>
        <td><?php echo $row["manufName"]; ?></td>
        <td><?php echo $row["quantity"]; ?></td>
        <td><?php echo $row["orderDateTime"]; ?></td>
        <td><?php echo "<form action='' method='POST'><input type='hidden' value=$row[id] name='id'><input type='submit' name='del' value='DELETE' class='btn btn-danger'></form>"?></td>
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

    <h1>Place order</h1>
    <form action="" class="main-links" method="POST">
        <input type='text' name='name' placeholder='name'>
        <input type='text' name='type' placeholder='type'>
        <input type='text' name='manu' placeholder='manu'>
        <input type='text' name='quantity' placeholder='Q'>
        <input type='submit' class="btn btn-primary" name='submit' value="Place Order">
    
    </form>
</body>
    <?php
        }
    ?>

</html>