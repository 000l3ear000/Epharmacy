<?php
include "./Database/database.php";
session_start();
if (isset($_POST['delmed'])) {
    $name = $_POST['name'];
    $manu = $_POST['manu'];
    $sql = "delete from inventory where name='$name' AND manufacturer='$manu'";
    if (mysqli_query($conn, $sql)) {
        // echo "success";
        unset($_POST);
    } else if (mysqli_errno($conn) == 1062) {
        echo "1062";
    } else {
        echo "<p>error</p> $sql." . mysqli_error($conn);
    }
}

if (isset($_POST['addmed'])) {
    $data = $_POST["name"];
    $sample = "SELECT id FROM inventory ORDER BY id DESC LIMIT 1";
    $id = mysqli_query($conn, $sample);
    $row = mysqli_fetch_assoc($id);
    $id = $row['id'];
    $id++;
    $sql = "INSERT INTO inventory (id, name, type, manufacturer, countDrugs, price) VALUES ($id, '$_POST[name]','$_POST[type]','$_POST[manu]',$_POST[quantity],$_POST[price])";

    if (mysqli_query($conn, $sql)) {
        // echo "success";
        unset($_POST);
    }

    // if the data with these EMP_IDNO already exists then do nothing
    else if (mysqli_errno($conn) == 1062) {
        echo "1062";
    } else {
        echo "<p>error</p> $sql." . mysqli_error($conn);
    }
}

if (isset($_POST['editmed'])) {


    $sql = "SELECT * FROM inventory WHERE name = '$_POST[name]' AND manufacturer = '$_POST[manu]'";
    $data = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($data);

    if (mysqli_query($conn, $sql)) {
        // echo "success";
    } else if (mysqli_errno($conn) == 1062) {
        echo "1062";
    } else {
        echo "<p>error</p> $sql." . mysqli_error($conn);
    }

    $sqlString = "SET";
    foreach ($_POST as $key => $value) {

        if (!empty($_POST[$key])) {

            if ($key == 'nname') {
                $sqlString .= " name = '$_POST[$key]',";
            } else if ($key == 'type') {
                $sqlString .= " type = '$_POST[$key]',";
            } else if ($key == 'nmanu') {
                $sqlString .= " manufacturer = '$_POST[$key]',";
            } else if ($key == 'quantity') {
                $sqlString .= " countDrugs = '$_POST[$key]',";
            } else if ($key == 'price') {
                $sqlString .= " price = '$_POST[$key]',";
            }
        }
    }

    $sqlString = substr($sqlString, 0, -1);
    // echo $sqlString;
    $insertString = "UPDATE inventory " . $sqlString . " WHERE name = '$_POST[name]' AND manufacturer = '$_POST[manu]'";

    if (mysqli_query($conn, $insertString)) {
        // echo "success";
        unset($_POST);
    }

    // if the same data exists
    else if (mysqli_errno($conn) == 1062) {
        echo "1062";
    } else {
        echo "<p>error</p> $insertString." . mysqli_errno($conn);
    }
}

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
            margin-top: 20px;
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(209, 28, 90, 1) 10%, rgba(96, 151, 135, 1) 11%, rgba(0, 212, 255, 1) 100%);
            background-repeat: no-repeat;
            background-size: auto;
            height: 100vh;
        }

        .main-links {
            display: flex;
            width: 100%;
            align-items: space-around;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid black;
        }

        .main-links input {
            margin-right: 10px;
        }

        h3 {
            text-align: center;
        }

        #logout {
            position: absolute;
            top: 20px;
            right: 50px;
        }

        .info h1,
        h2,
        h3,
        h4 {
            color: white;
            margin: 0px;
            padding: 0px;
        }

        #edit {
            position: absolute;
            bottom: 120px;
            left: 670px;
            width: 100px;
        }
    </style>
</head>

<body>

    <?php
    if (isset($_SESSION['employee'])) {
        echo "<h3>Welcome Manager</h3>" . "<br>";
    ?>
        <form action="" class="main-links" method="POST">
            <input class="search_bar" name="search" required type="text" placeholder="Search employees">
            <input value='Search' name='search_btn' class="btn btn-success" type="submit">
        </form>

        <?php
        if (isset($_POST['search'])) {
            $result = mysqli_query($conn, "SELECT * FROM employees where name like '$_POST[search]%'");
            if (mysqli_num_rows($result) > 0) {


        ?>

                <table class='table table-hover table-bordered table-dark'>

                    <tr class="table-primary">
                        <td>ID</td>
                        <td>Name</td>
                        <td>Password</td>
                        <td>Cnic</td>
                        <td>Contact1</td>
                        <td>Contact2</td>
                        <td>Address</td>
                        <td>Salary</td>
                        <td>Status</td>
                        <td>Joined Date</td>
                        <td>Left Date</td>
                        <td>Leaves</td>

                    </tr>
                    <?php
                    $i = 0;
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["password"]; ?></td>
                            <td><?php echo $row["cnic"]; ?></td>
                            <td><?php echo $row["contact1"]; ?></td>
                            <td><?php echo $row["contact2"]; ?></td>
                            <td><?php echo $row["address"]; ?></td>
                            <td><?php echo $row["salary"]; ?></td>
                            <td><?php echo $row["status"]; ?></td>
                            <td><?php echo $row["joinedDate"]; ?></td>
                            <td><?php echo $row["leftDate"]; ?></td>
                            <td><?php echo $row["leaves"]; ?></td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </table>

        <?php
            } else {
                echo "No result found";
            }
        }

        ?>

        <div class="info">
            <h1>Add a medicine</h1>
            <form action="" class="main-links" method="POST">

                <input name="name" required type="text" placeholder="Name">
                <input name="type" required type="text" placeholder="Type">
                </label><input name="manu" required type="text" placeholder="Manufacturer">
                <input name="quantity" required type="text" placeholder="Quantity">
                <input name="price" required type="text" placeholder="Price">
                <input name="addmed" type="submit" class="btn btn-primary" value="Add">

            </form>

            <h1>Remove a medicine</h1>
            <form action="" class="main-links" method="POST">

                <input name="name" required type="text" placeholder="Name">
                <input name="manu" required type="text" placeholder="Manufacturer">
                <input name="delmed" type="submit" class="btn btn-warning" value="Remove">

            </form>

            <h1>Edit a medicine</h1>
            <form action="" method="post">

                <input name="name" required type="text" placeholder="Name">
                <input name="manu" required type="text" placeholder="Manufacturer">

                <input name="nname" type="text" placeholder="New Name">
                <input name="type" type="text" placeholder="Type">
                <input name="nmanu" type="text" placeholder="New Manufacturer">
                <input name="quantity" type="text" placeholder="Quantity">
                <input name="price" type="text" placeholder="Price">
                <input name="editmed" id="edit" type="submit" class="btn btn-danger" value="Edit">

            </form>
        </div>


        <form action="" method="post">
            <input value="Logout" id="logout" class="btn btn-primary" name="logout" type="submit">
        </form>

    <?php
    } else {
        echo "session timeout";
    }

    if (isset($_POST['logout'])) {
        $re = $_SESSION['employee'];
        $re = 'em' . $re;
        $date = getdate();
        $date = $date['year'] . "-" . $date['mon'] . '-' . $date['mday'] . " " . $date['hours'] . ":" . $date['minutes'] . ":" . $date['seconds'];
        $sql = "INSERT INTO users (userid,visit_on,end_at)
                        VALUES ('$re','$_SESSION[date]','$date')";
        mysqli_query($conn, $sql);
        unset($_SESSION['employee']);
        session_destroy();
        header("Location: http://localhost/phppractice/project%20structure/index.php");
        exit();
    }
    ?>

</body>

</html>