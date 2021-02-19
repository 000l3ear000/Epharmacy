 <?php

require_once "server_configuration.php";

    $conn = mysqli_connect($host, $username, $passwrd);
    $dbname = "emedical";

    // error handlig here and executing
    // if ( $conn === False ){
    //     die("Could not create a connection");
    // }
    // else{
    //     echo "Connection established";
    // }

    // creation of database products
    $query = "CREATE DATABASE $dbname";

    // error handlig here and executing
    if ( mysqli_query($conn, $query) ){
        echo "<p>success</p>";
    }

    // if db already exists then do nothing >> hehe
    else if ( mysqli_errno($conn) == 1007 ){
        echo "";
    }
    else{
        echo "<p>error</p> $query." . mysqli_error($conn);
    }

    mysqli_select_db($conn, $dbname);

    $tableInventory = "CREATE TABLE inventory(
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(55) NOT NULL,
        type VARCHAR(55) NOT NULL,
        manufacturer VARCHAR(55) NOT NULL,
        countDrugs INT NOT NULL,
        price INT NOT NULL,
        PRIMARY KEY(id)
    )";

    // error handlig here and executing
    if ( mysqli_query($conn, $tableInventory) ){
        echo "<p>success</p>";
    }

    // if table already exists then do nothing AGAIN >> hehe AGAIN
    else if ( mysqli_errno($conn) == 1050 ){
        echo "";
    }
    else{
        echo "<p>error</p> $tableInventory." . mysqli_error($conn);
    }

    // $sample = "INSERT INTO inventory (id, name, type, manufacturer, countDrugs, price)
    //          VALUES (1, 'masks', 'medical accessory', 'osama', 12, 10)";
    // if ( mysqli_query($conn, $sample) ){
    //     echo "success";
    // }

    // // if the data with these EMP_IDNO already exists then do nothing
    // else if ( mysqli_errno($conn) == 1062 ){
    //     echo "";
    // }
    // else{
    //     echo "<p>error</p> $sample." . mysqli_error($conn);
    // }

    // EMID, CLID, ADID

    // employee table
    $tableEmp = "CREATE TABLE employees (
        id INT NOT NULL,
        name VARCHAR(55) NOT NULL,
        password VARCHAR(55) NOT NULL,
        cnic VARCHAR(55) NOT NULL,
        contact1 VARCHAR(55) NOT NULL,
        contact2 VARCHAR(55) NOT NULL,
        address VARCHAR(55) NOT NULL,
        salary INT NOT NULL,
        status VARCHAR(25) NOT NULL,
        joinedDate datetime default current_timestamp,
        leftDate DATE,
        leaves INT,
        PRIMARY KEY (cnic)
    )";

    // error handlig here and executing
    if ( mysqli_query($conn, $tableEmp) ){
        echo "<p>success</p>";
    }

    // if table already exists then do nothing AGAIN >> hehe AGAIN
    else if ( mysqli_errno($conn) == 1050 ){
        echo "";
    }
    else{
        echo "<p>error</p> $tableEmp." . mysqli_error($conn);
    }

    // $sample = "INSERT INTO employees(name, password, cnic, contact1, contact2, address, salary, status) VALUES('em', 'em', 'asdasd', 'asdasd', 'asdasd', 'asdasdad', 12, 'manager')";

    // if ( mysqli_query($conn, $sample) ){
    //     echo "success";
    // }
    // // if the data with these EMP_IDNO already exists then do nothing
    // else if ( mysqli_errno($conn) == 1062 ){
    //     echo "";
    // }
    // else{
    //     echo "<p>error</p> $sample." . mysqli_error($conn);
    // }


    // admin table 
    $tableAdmin = "CREATE TABLE admins(
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(55) NOT NULL,
        password VARCHAR(55) NOT NULL,
        PRIMARY KEY(id)
    )";

    // error handlig here and executing
    if ( mysqli_query($conn, $tableAdmin) ){
        echo "<p>success</p>";
    }

    // if table already exists then do nothing AGAIN >> hehe AGAIN
    else if ( mysqli_errno($conn) == 1050 ){
        echo "";
    }
    else{
        echo "<p>error</p> $tableAdmin." . mysqli_error($conn);
    }

    // $sample = "INSERT INTO admins(name, password) VALUES('admin', 'admin')";

    // if ( mysqli_query($conn, $sample) ){
    //     echo "success";
    // }
    // // if the data with these EMP_IDNO already exists then do nothing
    // else if ( mysqli_errno($conn) == 1062 ){
    //     echo "";
    // }
    // else{
    //     echo "<p>error</p> $sample." . mysqli_error($conn);
    // }


    // client table
    $tableClient = "CREATE TABLE clients(
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(55) NOT NULL,
        password VARCHAR(55) NOT NULL,
        address VARCHAR(55) NOT NULL,
        phone VARCHAR(55) NOT NULL,
        email VARCHAR(55) NOT NULL,
        PRIMARY KEY(id)
    )";

    // error handlig here and executing
    if ( mysqli_query($conn, $tableClient) ){
        echo "<p>success</p>";
    }

    // if table already exists then do nothing AGAIN >> hehe AGAIN
    else if ( mysqli_errno($conn) == 1050 ){
        echo "";
    }
    else{
        echo "<p>error</p> $tableClient." . mysqli_error($conn);
    }


    // supplier table
    // type tells what supplier supplies
    $tableSupplier = "CREATE TABLE suppliers(
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(55) NOT NULL,
        type VARCHAR(55) NOT NULL, 
        manufacturer VARCHAR(55) NOT NULL,
        PRIMARY KEY(id) 
    )";

    // error handlig here and executing
    if ( mysqli_query($conn, $tableSupplier) ){
        echo "<p>success</p>";
    }

    // if table already exists then do nothing AGAIN >> hehe AGAIN
    else if ( mysqli_errno($conn) == 1050 ){
        echo "";
    }
    else{
        echo "<p>error</p> $tableSupplier." . mysqli_error($conn);
    }
    
    // orders table
    $tableOrders = "CREATE TABLE supply_orders(
        id INT NOT NULL AUTO_INCREMENT,
        supplierName VARCHAR(55) NOT NULL,
        type VARCHAR(55) NOT NULL,
        manufName VARCHAR(55) NOT NULL,
        quantity INT NOT NULL,
        orderDateTime datetime default current_timestamp,
        PRIMARY KEY(id) 
    )";


    // error handlig here and executing
    if ( mysqli_query($conn, $tableOrders) ){
        echo "<p>success</p>";
    }

    // if table already exists then do nothing AGAIN >> hehe AGAIN
    else if ( mysqli_errno($conn) == 1050 ){
        echo "";
    }
    else{
        echo "<p>error</p> $tableOrders." . mysqli_error($conn);
    }

    // table used to log info about who logged in
    $tableUsers = "CREATE TABLE users(
        userid VARCHAR(55) NOT NULL,
        visit_on VARCHAR(55) NOT NULL,
        end_at VARCHAR(55) NOT NULL
    )";

    // error handlig here and executing
    if ( mysqli_query($conn, $tableUsers) ){
        echo "<p>success</p>";
    }

    // if table already exists then do nothing AGAIN >> hehe AGAIN
    else if ( mysqli_errno($conn) == 1050 ){
        echo "";
    }
    else{
        echo "<p>error</p> $tableUsers." . mysqli_error($conn);
    }


    // table to store clients
    $tableClientOrders = "CREATE TABLE clientOrders(
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(55) NOT NULL,
        userid VARCHAR(55) NOT NULL,
        address VARCHAR(55) NOT NULL,
        phone VARCHAR(55) NOT NULL,
        email VARCHAR(55) NOT NULL,
        orderDayTime datetime default current_timestamp,
        deliveryTime VARCHAR(55) NOT NULL,
        deliveryStatus VARCHAR(55) NOT NULL,
        charges INT NOT NULL,
        remainingDues INT,
        PRIMARY KEY(id)
    )";

    // error handlig here and executing
    if ( mysqli_query($conn, $tableClientOrders) ){
        echo "<p>success</p>";
    }

    // if table already exists then do nothing AGAIN >> hehe AGAIN
    else if ( mysqli_errno($conn) == 1050 ){
        echo "";
    }
    else{
        echo "<p>error</p> $tableUsers." . mysqli_error($conn);
    }


    // $tableClientOrders = "CREATE TABLE clientOrders(
    //     id INT NOT NULL;
    //     purchaseDate datetime default current_timestamp;
    //     charges INT NOT NULL,
    //     remainingDues INT,

    // )";