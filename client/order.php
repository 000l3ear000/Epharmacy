<?php
    include "../Database/database.php";
    session_start();
    if ( isset($_SESSION['client']) && isset($_POST['place_order']) ){
        $price=(int)$_POST['quantity_selected']*(int)$_SESSION['price'];  
        // echo $price;    
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
                        background: rgb(209,205,55);
                        background: linear-gradient(90deg, rgba(209,205,55,1) 0%, rgba(215,106,33,1) 35%, rgba(151,125,96,1) 51%, rgba(0,212,255,1) 100%);
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

                    .info{
                        display: flex;
                        justify-content: space-evenly;
                    }
                </style>
            </head>
            <body>
                <div class="info">
                    <h1>Name: <?php echo $_SESSION['name']; ?></h1>
                    <h2>Manufacturer: <?php echo $_SESSION['manu']; ?></p>
                    <h3>Quantity: <?php echo $_POST['quantity_selected']; ?></p>
                    <h4>Price: <?php echo $price;$_SESSION['price']=$price;?></p>
                </div>

                <div class="form-group">
                    <form action="orderDetails.php" class="main-links" method="POST">  
                        <input type="text" name="name" placeholder="Your Name" required>
                        <input type="text" name="address" placeholder="Your Address" required>
                        <input type="text" name="phone" placeholder="Your Phone" required>
                        <input type="email" name="email" placeholder="Your Email" required>
                        <input type="submit" name="submit" value="Order" class="btn btn-primary">
                    </form>
                </div>
            </body>
            </html>
<?php
    // unset($_SESSION['drugId']);
    }
?>
<?php
    if(!isset($_SESSION['client'])){
        echo "<a href='../login.php'>"."You need to login first"."</a>";
           
    }

    if(!isset($_POST['place_order'])){
        header("url=http://localhost/phppractice/project%20structure/index.php");
           
    }
    
    

?>