<?php
    include "../Database/database.php";
    session_start();
    if(!empty($_GET['drugId'])){
        $sql="SELECT * from inventory where id='$_GET[drugId]'";
        $data = mysqli_query($conn, $sql);
        if($data=mysqli_query($conn,$sql)){
            if(mysqli_num_rows($data)>0){
                while($row=mysqli_fetch_array($data)){
?>
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
                        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(132,96,151,1) 27%, rgba(209,28,90,1) 60%, rgba(0,212,255,1) 100%);
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
                    .info h1,h2,h3,h4{
                        color: white;
                        margin: 0px;
                        padding: 0px;
                    }

                    .order{
                        margin-top: 50px;
                    }
                </style>
            </head>
            <body>
                    <div class="info">
                        <h1>Name: <?php echo $row['name'];?></h1>
                        <h2>Manufacturer: <?php echo $row['manufacturer'];?></p>
                        <h3>Quantity: <?php echo $row['countDrugs'];?></p>
                        <h4>Price: <?php echo $row['price'];?></p>
                    </div>
            <?php
                $_SESSION['name'] = $row['name'];
                $_SESSION['manu'] = $row['manufacturer'];
                $_SESSION['price'] = $row['price'];
            ?>


                    <form action="order.php" class="order" method="POST">
                        <input type="number" value="1" min='0' name='quantity_selected'>
                        <input value='place order' name="place_order" class="btn btn-primary" type="submit">
                    </form>
                
            </body>
            </html>

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
    else{
        echo "asdasd";
    }

?>

