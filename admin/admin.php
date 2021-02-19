<?php
    session_start();
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
            background: linear-gradient(308deg, rgba(2,0,36,1) 0%, rgba(199,42,103,1) 37%, rgba(0,212,255,1) 100%);
            background-repeat:no-repeat;
            background-size:auto;
            height:100vh;
        }
        .admin{
            display:flex;
            width:300px;
            margin:0 auto;
            
        }
        
        .links{
            display:inline-block;
            
        }
        .links>a{
            display:inline-block;
            margin-left:40px;
        }
        .main-links{
            display:flex;
            width:100%;
            align-items:space-around;
            justify-content:center;    
            margin-bottom:20px;
            padding-bottom:20px;
            border-bottom:1px solid black;
        }
        .logout1{
            position:absolute;
            top:10px;
            right:10px;
        }   
        
    </style>
</head>
<body>
    <?php
    
        include "../Database/database.php";
        if(isset($_SESSION['admin'])){
            echo "<h3 style='text-align:center; margin-top:10px'>Welcome to admin</h3>"."<br>";
            echo "";
    ?>
    <?php
        $_SESSION['supplier']=true;
    ?>
    <div class="main-links">
        <div class="links">
            <a class="btn btn-warning" href="./supplier.php">Supplier</a>
            
            
            <?php
                $_SESSION['update_employee']=true;
            ?>
            <a class="btn btn-danger" href="./updateEmployee.php">Employee management</a>
        </div>
        <hr>
        
        <div class="admin">
            <form action="" method="POST">
                <input class="search_bar" name="search" required type="text" placeholder="Search from inventory">
                <input value='Search' name='search_btn' class="btn btn-primary" type="submit">
            </form> 
            <hr>
        </div>
    </div>
    <?php
        if ( isset($_POST['search']) ){
            $result = mysqli_query($conn, "SELECT * FROM inventory where name like '$_POST[search]%'");
            if (mysqli_num_rows($result) > 0) {
        

    ?>

        <table class='table table-hover table-bordered table-dark'>
        
        <tr class="bg-info"> 
            <td>ID</td>
            <td>Name</td>
            <td>Type</td>
            <td>Manufacturer</td>
            <td>Quantity</td>
            <td>Price</td>
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
    <div class="logout1">
        <form action="" class="logout" method="post">
            <input value="Logout" class="btn btn-success" name="logout" type="submit">
        </form>
    </div>
    <?php
        }
        else{
            echo "session timeout";
        }
        $re=$_SESSION['admin'];
        $re="ad".$re;
        
        if (isset($_POST['logout'])){
            $date=getdate();
            $date=$date['year']."-".$date['mon'].'-'.$date['mday']." ".$date['hours'].":".$date['minutes'].":".$date['seconds'];
            $sql = "INSERT INTO users (userid,visit_on,end_at)
                        VALUES ('$re','$_SESSION[date]','$date')";
            mysqli_query($conn,$sql);
            session_destroy();            
            header("Location: http://localhost/phppractice/project%20structure/index.php");
            exit();
        }
    ?>
    <hr>



</body>
</html>

<?php
    if(isset($_POST['search_btn'])){
        

    }


?>