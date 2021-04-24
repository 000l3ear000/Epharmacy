<?php

include "./Database/database.php";
// error handlig here and executing
// if ($conn === False) {
//     die("Could not create a connection");
// } else {
//     echo "Connection established";
// }
if (isset($_POST["submit"])) {

    $var = $_POST["id"];
    $id = (int)substr($var, 2);
    $pass = $_POST["password"];
    if (strtolower(substr($var, 0, 2)) == "ad") {
        $date = getdate();
        $date = $date['year'] . "-" . $date['mon'] . '-' . $date['mday'] . " " . $date['hours'] . ":" . $date['minutes'] . ":" . $date['seconds'];
        $quer = "SELECT * FROM admins where id='$id' AND password='$pass'";
        $data = mysqli_query($conn, $quer);
        if (mysqli_num_rows($data) > 0) {
            $row = mysqli_fetch_assoc($data);
            session_start();
            mysqli_query($conn, $sql);
            $_SESSION['admin'] = $row['id'];
            $_SESSION['date'] = $date;

            header("Location: http://localhost/phppractice/project%20structure/admin/admin.php");
            //redirect goes here
        } else {
            echo "Wrong password Admin brother";
        }
    } else if (strtolower(substr($var, 0, 2)) == "em") {

        $quer = "SELECT * FROM employees where id='$id' AND password='$pass'";
        $data = mysqli_query($conn, $quer);
        if (mysqli_num_rows($data) > 0) {
            $row = mysqli_fetch_assoc($data);
            if (strtolower($row['status']) == "manager") {
                $date = getdate();
                $date = $date['year'] . "-" . $date['mon'] . '-' . $date['mday'] . " " . $date['hours'] . ":" . $date['minutes'] . ":" . $date['seconds'];
                session_start();
                $_SESSION['employee'] = $row['id'];
                $_SESSION['date'] = $date;
                header("Location: http://localhost/phppractice/project%20structure/employee.php");
                exit();
            } else {
                echo "YOU ARE NOT ALLOWED TO ACCESS THIS SECTION!!!";
            }
        } else {
            echo "You are not yet registered yet. Have patience admin will add you soon :)";
        }
    } else if (strtolower(substr($var, 0, 2)) == "cl") {
        $var = $_POST["id"];
        $pass = $_POST['password'];
        $quer = "SELECT * FROM clients where id='$id' AND password='$pass'";
        $data = mysqli_query($conn, $quer);
        if (mysqli_num_rows($data) > 0) {
            $row = mysqli_fetch_assoc($data);
            $date = getdate();
            $date = $date['year'] . "-" . $date['mon'] . '-' . $date['mday'] . " " . $date['hours'] . ":" . $date['minutes'] . ":" . $date['seconds'];
            session_start();
            $_SESSION['client'] = $row['id'];
            $_SESSION['clientRemain'] = 999;
            $_SESSION['date'] = $date;
            header("Location: http://localhost/phppractice/project%20structure/index.php");
            exit();
            //redirect goes here
        } else {
            echo "You are not in our database";
            echo "You need to signup first";
            // header("Location:  http://localhost/phppractice/project%20structure/signup.php");
            // exit();

        }
    } else {
        echo "invalid username";
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
    <title>Login</title>
    <style>
        body {
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(25,117,158,1) 36%, rgba(0,212,255,1) 100%);
            background-repeat:no-repeat;
            background-size:auto;
            height:80vh;
        }

        .login {

            display: flex;
            flex-direction: column;
            margin: 0 auto;
            align-items: center;
            width: 30%;
            margin-top: 200px;
        }

        .login>input {
            width: 100%;
        }
    </style>
</head>

<body>


    <form action="" class="login" method="post">
        <h1>Login Form :)</h1>
        <input type="text" required name="id" placeholder="Your login Id">
        <input type="password" required name="password" placeholder="password">
        <input type="submit" class="btn btn-success" name="submit" value="submit">
    </form>


</body>

</html>