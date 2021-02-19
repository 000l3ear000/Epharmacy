<?php
    include "../Database/database.php";
    session_start();
    if(isset($_SESSION['update_employee'])){
        if(isset($_POST['add_emp'])){
            $sample = "SELECT id FROM employees ORDER BY id DESC LIMIT 1";
            if ( !mysqli_query($conn, $sample)){
                $id = 1;
            }
            else{
                $row=mysqli_query($conn, $sample);
                $row=mysqli_fetch_assoc($row);
                $id=$row['id'];
                $id++;
            }
            
            $sql = "INSERT INTO employees (id, name, password, cnic, contact1,contact2,address,salary,status)
            VALUES ($id,'$_POST[name]','$_POST[password]','$_POST[cnic]','$_POST[contact1]','$_POST[contact2]','$_POST[address]','$_POST[salary]','$_POST[status]')";
            
            if ( mysqli_query($conn, $sql) ){
                echo "success";
                unset($_POST);
            }
    
            // if the data with these EMP_IDNO already exists then do nothing
            else if ( mysqli_errno($conn) == 1062 ){
                echo "<h3>Employee already exists :<<<<</h3>";
            }
            else{
                echo "<p>error</p> $sql." .mysqli_error($conn);
            }

        }
        if(isset($_POST['del_employee'])){
            $id=$_POST['id'];
            $sql="delete from employees where id='$id'";
            if(mysqli_query($conn,$sql)){
                echo "success";
                unset($_POST);
            }
            else if ( mysqli_errno($conn) == 1062 ){
                echo "1062";
            }
            else{
                echo "<p>error</p> $sql." . mysqli_error($conn);
            }
        }
        
        if(isset($_POST['update_employee'])){


            $sql = "SELECT * FROM employees WHERE name = '$_POST[name]' AND cnic = '$_POST[cnic]'";
            $data = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($data);
    
            if ( mysqli_query($conn, $sql) ){
                echo "success";
            }
            else if ( mysqli_errno($conn) == 1062 ){
                echo "1062";
            }
            else{
                echo "<p>error</p> $sql." . mysqli_error($conn);
            }
    
            $sqlString = "SET";
            foreach($_POST as $key=>$value){
    
                if ( !empty($_POST[$key]) ){
    
                    if ( $key == 'nname' ){
                        $sqlString.= " name = '$_POST[$key]',";
                    }
                    else if ( $key == 'npassword' ){
                        $sqlString.= " password = '$_POST[$key]',";
                    }
                    else if ( $key == 'ncontact1' ){
                        $sqlString.= " contact1 = '$_POST[$key]',";
                    }
                    else if ( $key == 'ncontact2' ){
                        $sqlString.= " contact2 = '$_POST[$key]',";
                    }
                    else if ( $key == 'naddr' ){
                        $sqlString.= " address = '$_POST[$key]',";
                    }
                    else if ( $key == 'nsalary' ){
                        $sqlString.= " salary = '$_POST[$key]',";
                    }
                    else if ( $key == 'nstatus' ){
                        $sqlString.= " status = '$_POST[$key]',";
                    }
                    else if ( $key == 'leftDate' ){
                        $sqlString.= " leftDate = '$_POST[$key]',";
                    }
                    else if ( $key == 'nleaves' ){
                        $sqlString.= " leaves = '$_POST[$key]',";
                    }
                }
            }
    
            $sqlString = substr($sqlString, 0, -1 );
            echo $sqlString;
            $insertString = "UPDATE employees ".$sqlString." WHERE name = '$_POST[name]' AND cnic = '$_POST[cnic]'";
            // echo $insertString;
            if ( mysqli_query($conn, $insertString) ){
                echo "success";
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
            margin-top: 20px;
            background: rgb(2,0,36);
            background: linear-gradient(308deg, rgba(2,0,36,1) 0%, rgba(216,207,249,1) 0%, rgba(211,171,193,1) 32%, rgba(31,184,95,1) 94%);
            background-repeat:no-repeat;
            background-size:auto;
            height:100vh;
        }
    </style>
</head>
<body>
    <?php
        $result = mysqli_query($conn, "SELECT * FROM employees");
        if (mysqli_num_rows($result) > 0) {
    ?>

        <table class='table table-hover table-bordered table-dark'>
        
        <tr class="bg-success"> 
            <td>id</td>
            <td>Name</td>
            <td>Password</td>
            <td>cnic</td>
            <td>contact1</td>
            <td>contact2</td>
            <td>address</td>
            <td>salary</td>
            <td>status</td>
            <td>joined</td>
            <td>left</td>
            <td>leaves</td>
            <td>Action</td>
        </tr>
    <?php
        $i = 0;
        while($row = mysqli_fetch_array($result)) {
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
        <td><?php echo "<form action='' method='POST'><input type='hidden' value=$row[id] name='id'><input type='submit' name='del_employee' value='DELETE' class='btn btn-danger'></form>"?></td>
        <!-- <td><a href="update.php?drugid=$row['id']" class="btn btn-primary">Edit</a>
            <a href="#" class = "btn btn-warning">Delete</a>
        </td> -->
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
    <form action="" class="main-links" method="post">
        <input type="text" name="name" required placeholder="Name">
        <input type="text" name="cnic" required placeholder="cnic">
        <input type="text" name="password" required placeholder="password">
        <input type="text" name="contact1" required placeholder="contact1">
        <input type="text" name="contact2" required placeholder="contact2">
        <input type="text" name="address" required placeholder="address">
        <input type="text" name="salary" required placeholder="salary">
        <input type="text" name="status" required placeholder="status">
        <input type="submit" name="add_emp" class="btn btn-warning" value="Add Emp">
    </form>    

    <form action="" class="main-links" method="POST">
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="cnic" placeholder="Cnic" required>
        <input type="text" name="nname" placeholder="New Name">
        <input type="text" name="npass" placeholder="New Password">
        <input type="text" name="ncontact1" placeholder="New contact 2">
        <input type="text" name="ncontact2" placeholder="New contact 2">
        <input type="text" name="naddr" placeholder="New Addr">
        <input type="text" name="nsalary" placeholder="New Salary">
        <input type="text" name="nstatus" placeholder="New Status">
        <input type="text" name="leftDate" placeholder="Left Date YY-MM-DD">
        <input type="text" name="nleaves" placeholder="Leaves">
        <input type="submit" name="update_employee" value="Update" class="btn btn-success">
    </form>


</body>
<?php
        }
    ?>
</html>