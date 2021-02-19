<?php
    include "./Database/database.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        body {
            background: rgb(2,0,36);
            background: linear-gradient(308deg, rgba(2,0,36,1) 0%, rgba(199,65,42,1) 59%, rgba(0,212,255,1) 100%);
            background-repeat:no-repeat;
            background-size:auto;
            height:80vh;
        }

        .signup {

            display: flex;
            flex-direction: column;
            margin: 0 auto;
            align-items: center;
            width: 30%;
            margin-top: 150px;
            
        }
        input::placeholder{
            text-align: center;
        }
        h1{
            color:whitesmoke;
            margin-bottom:20px;
        }

        .signup>input {
            width: 100%;
            height:40px;
            padding:10px;
        }        
    </style>
</head>
<body>


    
    <form action="" class="signup" method="POST">
        <h1>Client Signup Here</h1>
        <input name="name" required type="text" placeholder="Name">
        <input name="password" required type="text" placeholder="password">
        <input name="address" required type="text" placeholder="Address">
        <input name="phone" required type="text" placeholder="phone">
        <input name="email" required type="text" placeholder="email">
        <input name="submit" class="btn btn-primary" type="submit" value="Submit">
    </form>
    <?php
        $sql="INSERT INTO clients(name, password, address, phone, email) VALUES (?, ?, ?, ?, ?)";

        if (isset($_POST['submit'])){

            // binding the params with stmt
            if ( $stmt = mysqli_prepare($conn, $sql) ){
                mysqli_stmt_bind_param($stmt, "sssss", $name, $password, $address, $phone, $email);

                // if the data for every key is set then get that data otherwise do nothing
                $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';
                $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
                $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : '';
                $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
                $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';

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

            $sql = "SELECT id FROM clients ORDER BY id DESC LIMIT 1";
            $id = mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($id);
            $id=$row['id'];
            session_start();
            $_SESSION['client_creation'] = $id;
            header("Location: http://localhost/phppractice/project%20structure/index.php");
        }

    ?>

</body>
</html>