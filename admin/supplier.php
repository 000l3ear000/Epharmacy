<?php
    include "../Database/database.php";
    session_start();

    if(isset($_SESSION['supplier'])){

        if(isset($_POST['add_supp'])){
            
            $sample = "SELECT id FROM suppliers ORDER BY id DESC LIMIT 1";
            if ( !mysqli_query($conn, $sample)){
                $id = 1;
            }
            else{
                $row=mysqli_query($conn, $sample);
                $row=mysqli_fetch_assoc($row);
                $id=$row['id'];
                $id++;
            }
            
            $sql = "INSERT INTO suppliers (id, name, type, manufacturer) VALUES ($id, '$_POST[name]','$_POST[type]','$_POST[manu]')";
            
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


        if(isset($_POST['del'])){
            $id=$_POST['id'];
            $sql="delete from suppliers where id=$id";
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

        if(isset($_POST['update_supp'])){

            $sql = "SELECT * FROM suppliers WHERE name = '$_POST[name]' AND manufacturer = '$_POST[manu]'";
            $data = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($data);
    
            // if ( mysqli_query($conn, $sql) ){
            //     echo "success";
            // }
            // else if ( mysqli_errno($conn) == 1062 ){
            //     echo "1062";
            // }
            // else{
            //     echo "<p>error</p> $sql." . mysqli_error($conn);
            // }
    
            $sqlString = "SET";
            foreach($_POST as $key=>$value){
    
                if ( !empty($_POST[$key]) ){
    
                    if ( $key == 'nname' ){
                        $sqlString.= " name = '$_POST[$key]',";
                    }
                    else if ( $key == 'type' ){
                        $sqlString.= " type = '$_POST[$key]',";
                    }
                    else if ( $key == 'nmanu' ){
                        $sqlString.= " manufacturer = '$_POST[$key]',";
                    }
                }
            }
    
            $sqlString = substr($sqlString, 0, -1 );
            // echo $sqlString;
            $insertString = "UPDATE suppliers ".$sqlString." WHERE name = '$_POST[name]' AND manufacturer = '$_POST[manu]'";
    
            if ( mysqli_query($conn, $insertString) ){
                // echo "success";
                unset($_POST);
            }
    
            // if the same data exists
            else if ( mysqli_errno($conn) == 1062 ){
                echo "1062";
            }
            else{
                echo "<p>error</p> $insertString." . mysqli_errno($conn);
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
            background: rgb(2,0,36);
            background: linear-gradient(308deg, rgba(2,0,36,1) 0%, rgba(216,207,249,1) 0%, rgba(31,184,95,1) 94%);
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

        a{
            position: absolute;
            top: 20px;
            right: 50px;
        }
    </style>
</head>
<body>
    
    <form action="" class="main-links" method="POST">
        <input class="search_bar" name="search" required type="text" placeholder="Search suppliers">
        <input value='Search' name='search_btn' class="btn btn-success" type="submit">
    </form> 

    <?php
        if((isset($_POST['search_btn'])) && (!empty(isset($_POST['search'])))){
            $result = mysqli_query($conn, "SELECT * FROM suppliers where name like '$_POST[search]%'");
            if (mysqli_num_rows($result) > 0) {
    ?>

        <table class='table table-hover table-bordered table-dark'>
        
        <tr class="bg-primary"> 
            <td>ID</td>
            <td>Name</td>
            <td>Type</td>
            <td>Manufacturer</td>
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
    }

    ?>

    <?php
        if(!isset($_POST['search_btn'])){
            $result = mysqli_query($conn, "SELECT * FROM suppliers" );
            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table table-hover table-bordered table-dark'>";
                echo "
                <tr  class='bg-info'> 
                    <td>id</td>
                    <td>Name</td>
                    <td>Type</td>
                    <td>Manufacturer</td>
                    <td>Action</td>
                </tr>";
                $i = 0;
                while($row = mysqli_fetch_array($result)) {
                    
                    echo "<tr>
                    <td>". $row['id']. "</td>
                    <td>". $row['name'] . "</td>
                    <td>". $row['type']. "</td>
                    <td>". $row['manufacturer'] . "</td>"
                ?>
                    <td><?php echo "<form action='' method='POST'><input type='hidden' value=$row[id] name='id'><input type='submit' name='del' value='DELETE' class='btn btn-danger'></form>"?></td>
                <?php
                    echo "</tr>";
                    $i++;
                }

                echo "</table>";
            }
            else{
                echo "No result found";
            }
        }   

    ?>

    
    <form action="" class= "main-links" method='post'>
        <input name='name' required type="text" placeholder="Name">
        <input name='type' required type="text" placeholder="Type">
        <input name='manu' required type="text" placeholder="Manufac">
        <input name='add_supp' class="btn btn-success" value='Add' type='submit'>
    </form>

    <form action="" class="main-links" method='post'>
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="manu" placeholder="Manufac">
        <input name='nname' type="text" placeholder="New Name">
        <input name='type' type="text" placeholder="Type">
        <input name='nmanu' type="text" placeholder="New Manu">
        <input name='update_supp' value='Update' class="btn btn-warning" type='submit'>
    </form>

    

    <?php
        } ///dont remove
    ?>

    <?php
        $_SESSION['order_supplier'] = true;
    ?>
    <a href="order_supplier.php" class="btn btn-primary">ORDER</a>
</body>
</html>