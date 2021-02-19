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
    <link rel="stylesheet" href="./styling files/index.css">
    <title>E Medical Store</title>
</head>
<body>

    
        <form action="" class="indexForm" method="POST">
            <input class="search_bar" name="search" required type="text" placeholder="Search your medicine">
            <input value='Search' id="search" name='search_btn' class="btn btn-success" type="submit">
            <label for="">Select a Category:</label>
            <select name="category">
                <option value="none">none</option>
                <option value="feroz">feroz sons</option>
                <option value="pfizer">pfizer</option>
                <option value="getz">getz</option>
                <option value="abbott">abbott</option>
            </select>
        </form> 

    <div class="main">
    <?php
        include "./Database/database.php";
        if(!isset($_SESSION['client']) && !isset($_SESSION['employee']) && !isset($_SESSION['admin'])){
    ?>
            <div class="main-btns">
                <a class = "btn btn-primary" href="login.php">Login</a>
                <a class = "btn btn-success" href="signup.php">Signup</a>
            </div>
            <br>
    <?php
        }
    ?>

    <?php
        if(isset($_SESSION['client'])){
    ?>
    
    <form action="" class="main-btns" method="post">
        <input type='submit' class="btn btn-danger"  name='client_logout' value="Logout">
        <input type="submit" name="my_orders" class="btn btn-warning" value="View My Orders">
    </form>
    <?php
        if(isset($_POST['client_logout'])){
            $re=$_SESSION['client'];
            $re='cl'.$re;
            $date=getdate();
            $date=$date['year']."-".$date['mon'].'-'.$date['mday']." ".$date['hours'].":".$date['minutes'].":".$date['seconds'];
            $sql = "INSERT INTO users (userid,visit_on,end_at)
                        VALUES ('$re','$_SESSION[date]','$date')";
            mysqli_query($conn,$sql);
            session_destroy();
            unset($_SESSION['client']);
            header("Location: https://mysterious-thicket-17456.herokuapp.com/index.php");
            // unset($_SESSION['client']);

        }

        if ( isset($_POST['my_orders']) ){
            $_SESSION['my_orders'] = $_POST['my_orders'];
            header("Location: https://mysterious-thicket-17456.herokuapp.com/client/myOrders.php");
            exit();
        }
    ?>
    <?php
        }
    ?>
    <?php
        if(!isset($_POST['search_btn'])){
            $sql="SELECT * from inventory";
            if($data=mysqli_query($conn,$sql)){
                if(mysqli_num_rows($data)>0){
                    while($row=mysqli_fetch_array($data)){
                    
                        echo "<h3 class='result'><a href='./client/client.php?drugId=".$row['id']. "'>". $row['name']."<br></a></h3>";
    ?>  
    <?php          
                    }
                }
            }
            else if ( mysqli_errno($conn) == 1062 ){
                echo "1062";
            }
            else{
                echo "<p>error</p> $sql." . mysqli_error($conn);
            }
        }
    ?>
    <?php
        if((isset($_POST['search_btn'])) && (!empty(isset($_POST['search'])))){
            if(isset($_POST['category']) && $_POST['category']!=='none'){
                $sql="SELECT * from inventory where manufacturer='$_POST[category]' AND name like '$_POST[search]%'";    
                // echo $_POST['category'];
            }
            else{
                $sql="SELECT * from inventory where name like '$_POST[search]%'";
            }
            
            if($data=mysqli_query($conn,$sql)){
                if(mysqli_num_rows($data)>0){
                    while($row=mysqli_fetch_array($data)){
                        echo "<h3 class='result'><a href='./client/client.php?drugId=".$row['id']. "'>". $row['name']."<br></a></h3>";                  
    ?>
    <?php
                    }
                }
            }
            else if ( mysqli_errno($conn) == 1062 ){
                echo "1062";
            }
            else{
                echo "<p>error</p> $sql." . mysqli_error($conn);
            }

        }

    ?>


    <?php
        // session_start();
        if (isset($_SESSION['client_creation'])){

            $id = $_SESSION['client_creation'];

            echo "<h1>Your id is cl$id </h1><br>";
            // echo "<h3> You will be redirected to your home in 5 4 3 2 1 ...:)</h3><br>";
            session_destroy();
            unset($_SESSION['client']);
            header("Refresh:5; url=https://mysterious-thicket-17456.herokuapp.com/login.php");
            // sleep(5);
        }
        
        

    ?>

    </div>
</body>
</html>